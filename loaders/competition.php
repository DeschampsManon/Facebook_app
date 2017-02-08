<?php
    $competition = new CompetitionController();
    $competition->tryToStartCompetition();

    if(!isset($_SESSION['id_concours']) || empty($_SESSION['id_concours'])) {
        $_SESSION['COMPETITION'] = 0;
    }else{
        $_SESSION['COMPETITION'] = 1;
    }

?>