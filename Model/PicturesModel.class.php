<?php
class PicturesModel extends MyModel {

    public function __construct() { }

    public function getAllPictures() {
        // TODO rajouter WHERE id concours = session id concours
        $request = MyController::$bdd->prepare('SELECT * FROM photos ORDER BY creation_date DESC');
        $request->execute(array());
        $result = $request->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

    public function getPicture($id) {
        $request = MyController::$bdd->prepare('SELECT * FROM photos WHERE id_photo = ?');
        $request->execute(array($id));

        $result = $request->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function addPicture($pic) {

        $request = MyController::$bdd->prepare('INSERT INTO photos (id_photo, link_photo, link_like, id_user, id_concours) 
                                                VALUES (?, ?, ?, ?, ?)');

        echo 'id_photo => ' . $pic['id_photo'] . ' //// id_user => ' . $pic['id_user'] . '  /';

        $request->execute(array(
            $pic['id_photo'],
            $pic['link_photo'],
            $pic['link_like'],
            $pic['id_user'],
            $pic['id_concours']
        ));
    }
}
?>