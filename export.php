<?php
    session_start();

    require __DIR__.'/loaders/dependencies.php';
    require __DIR__.'/loaders/classLoader.php';
    require __DIR__.'/loaders/bdd.php';
    require __DIR__.'/vendor/PHPExcel.php';
    require __DIR__.'/vendor/PHPExcel/Writer/Excel2007.php';

    // On stock la variable fb (api facebook) dans une variable statique
    MyController::$fb = new Facebook\Facebook([
        'app_id' => '325674481145757',
        'app_secret' => '',
        'default_graph_version' => 'v2.8',
    ]);

    MyController::$fb->setDefaultAccessToken('325674481145757|');

    // On demande une instance sur la class ApiController qui permet de lancer une requette à l'API Facebook
    $api = ApiController::getInstance();

    $excel = new PHPExcel();
    $sheet = $excel->getActiveSheet();

    function array_sort($array, $on, $order=SORT_DESC)
    {
        $new_array = array();
        $sortable_array = array();

        if (count($array) > 0) {
            foreach ($array as $k => $v) {
                if (is_array($v)) {
                    foreach ($v as $k2 => $v2) {
                        if ($k2 == $on) {
                            $sortable_array[$k] = $v2;
                        }
                    }
                } else {
                    $sortable_array[$k] = $v;
                }
            }

            switch ($order) {
                case SORT_ASC:
                    asort($sortable_array);
                    break;
                case SORT_DESC:
                    arsort($sortable_array);
                    break;
            }

            foreach ($sortable_array as $k => $v) {
                $new_array[$k] = $array[$k];
            }
        }

        return $new_array;
    }

    $concours = $_SESSION['id_concours'];
    $resultats = array();
    $count = 0;

    $request = MyController::$bdd->query('SELECT * FROM photos WHERE id_concours = '. $concours);
    $result = $request->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $photo) {
        $likes = $api->getRequest($photo['link_like']);

        $countLikes = (isset($likes['share'])) ? $likes['share']['share_count'] : "0";

        $request = MyController::$bdd->query('SELECT first_name, name FROM users WHERE id_user = '. $photo['id_user']);
        $result = $request->fetch(PDO::FETCH_ASSOC);

        $resultats[$count]['user'] = $result['first_name'] . ' ' . $result['name'];
        $resultats[$count]['link_photo'] = $photo['link_photo'];
        $resultats[$count]['likes'] = $countLikes;
        $count++;
    }

    $resultats = array_sort($resultats, 'likes');

    $sheet->setCellValue('A1','Nom de l\'utilisateur');
    $sheet->setCellValue('B1','URL de l\'image');
    $sheet->setCellValue('C1','Nombre de likes');


    $styleArray = array(
        'font'=>array(
            'bold'=>true
        )
    );

    $sheet->getStyle('A1')->applyFromArray($styleArray);
    $sheet->getStyle('B1')->applyFromArray($styleArray);
    $sheet->getStyle('C1')->applyFromArray($styleArray);

    $sheet->getColumnDimension('A')->setWidth('20');
    $sheet->getColumnDimension('B')->setWidth('60');
    $sheet->getColumnDimension('C')->setWidth('30');

    $sheet->fromArray($resultats, null, 'A2');

    $writer = new PHPExcel_Writer_Excel2007($excel);

    header('Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition:inline;filename=Fichier.xlsx ');
    $writer->save('php://output');