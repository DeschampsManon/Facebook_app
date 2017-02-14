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
            $_SESSION['ERR'] = "La date de démarrage est inférieur à la date actuelle";
        }else{

            if($start >= $end) {
                $_SESSION['ERR'] = "La date de démarrage est supérieur ou égal à la date de fin";
            }else{
                $this->competitionModel->createCompetition($competition);
                $this->competitionModel->tryToStartCompetition();

                $_SESSION['MESSAGE'] = "Votre concours a bien été crée !";
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