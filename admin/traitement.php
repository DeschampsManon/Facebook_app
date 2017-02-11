<?php
    // On charge toutes les fichiers nécéssaires au bon fonctionnement de l'application
    require __DIR__.'/../loaders/globalLoader.php';

    $title = $_POST['title'];
    $title2 = $_POST['title2'];
    $texte = $_POST['texte'];

    $request = MyController::$bdd->prepare('UPDATE frontoffice SET title = ?, title2 = ?, texte = ?');
    $request->execute(array(
        $title,
        $title2,
        $texte
    ));

    echo 1;