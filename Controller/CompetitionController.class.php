<?php
class CompetitionController extends MyController {

    private $competitionModel;

    public function __construct() {
        $this->competitionModel = new CompetitionModel();
    }

    public function createCompetition($competition) {

        $today = date('U');
        $start = date('U', strtotime($competition['starting_date']));
        $end = date('U', strtotime($competition['end_date']));

        if($start < $today) {
            echo 'ERREUR : La date de démarrage est inférieur à la date actuelle';
            // TODO Erreur en variable de session !!
        }else{

            if($start >= $end) {
                echo 'ERREUR : La date de démarrage est supérieur ou égal à la date de fin';
                // TODO Erreur en variable de session !!
            }else{
                $this->competitionModel->createCompetition($competition);
                $this->competitionModel->tryToStartCompetition();

                echo 'VOTRE CONCOURS A BIEN ETE CRÉE';
            }
        }
    }

    public function tryToStartCompetition(){
        $this->competitionModel->tryToStartCompetition();
    }

    public function getCompetitionById($id) {
        $result = $this->competitionModel->getCompetitionById($id);
        return $result;
    }

}
?>