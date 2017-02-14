<?php

require __DIR__.'/loaders/dependencies.php';
require __DIR__.'/loaders/classLoader.php';
require __DIR__.'/loaders/bdd.php';
require 'vendor/phpmailer/phpmailer/PHPMailerAutoload.php';

// On stock la variable fb (api facebook) dans une variable statique
MyController::$fb = new Facebook\Facebook([
    'app_id' => '325674481145757',
    'app_secret' => '',
    'default_graph_version' => 'v2.8',
]);

MyController::$fb->setDefaultAccessToken('325674481145757|b07143c0ac82e515af99ca29cd3b1c55');

// On demande une instance sur la class ApiController qui permet de lancer une requette à l'API Facebook
$api = ApiController::getInstance();

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





// On regarde si un concours est terminé
$request = MyController::$bdd->query('SELECT id_concours, end_date FROM concours WHERE status = 1');
$result = $request->fetch(PDO::FETCH_ASSOC);

if(!empty($result['id_concours'])) {
    $concours = $result['id_concours'];
    $today = date('U');
    $end = date('U', strtotime($result['end_date']));

    if($result['end_date'] <= $today) {
        // On stoppe le concours s'il est terminé
        $request = MyController::$bdd->exec('UPDATE concours SET status = 0 WHERE status = 1');
        $request = MyController::$bdd->exec('UPDATE users SET participation = 0');



        /* GET LIKES */

        $resultats = array();
        $count = 0;

        $request = MyController::$bdd->query('SELECT * FROM photos WHERE id_concours = '. $concours);
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $photo) {
            $likes = $api->getRequest($photo['link_like']);

            $countLikes = (isset($likes['share'])) ? $likes['share']['share_count'] : 0;

            $request = MyController::$bdd->query('SELECT first_name, name FROM users WHERE id_user = '. $photo['id_user']);
            $result = $request->fetch(PDO::FETCH_ASSOC);

            $resultats[$count]['user'] = $result['first_name'] . ' ' . $result['name'];
            $resultats[$count]['link_photo'] = $photo['link_photo'];
            $resultats[$count]['likes'] = $countLikes;
            $count++;
        }

        $resultats = array_sort($resultats, 'likes');



        $data = array(
            'message' => 'Découvrez ci-dessous la photo du gagnant du concours pardon maman !',
            'link' => $resultats[0]['link_photo']
        );


        // On récupère les id de tous les utilisateurs
        $request = MyController::$bdd->query('SELECT id_user FROM users');
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        foreach($result as $id) {
            $api->postRequest('/'.$id['id_user'].'/feed', $data);
        }


        // Send mail to admin

        $accounts = $api->getRequest('/app/roles', '325674481145757|2_coNBtFEJH6uQenqtAHJCLBcaY');

        foreach ($accounts['data'] as $key => $account) {
            if($account['role'] == 'administrators') {
                $administrators[] = $account['user'];
            }
        }

        foreach ($administrators as $id) {
            $email = $api->getRequest('/'.$id.'?fields=email', '325674481145757|2_coNBtFEJH6uQenqtAHJCLBcaY');
            $emails[] = $email['email'];
        }



        $body = "";
        $body .= "<table border='1'>";
        $body .= "<tr>";
        $body .= "<th>User</th>";
        $body .= "<th>link photo</th>";
        $body .= "<th>likes</th>";
        $body .= "</tr>";
        foreach ($resultats as $resultat) {
            $body .= "<tr>";
            $body .= "<td>".$resultat['user']."</td>";
            $body .= "<td>".$resultat['link_photo']."</td>";
            $body .= "<td>".$resultat['likes']."</td>";
            $body .= "</tr>";
        }
        $body .= "</table>";

        foreach($emails as $email) {

            $mail = new PHPMailer;
            $mail->isHTML(true);
            $mail->setFrom('concourspardonmaman@no-reply.fr', 'Concours Photo Pardon Maman');
            $mail->addAddress($email);
            $mail->addReplyTo('info@example.com', 'Information');
            $mail->Subject = 'Résultats du concours';
            $mail->Body    = $body;
            $mail->send();

        }


    }
}