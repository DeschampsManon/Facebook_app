<?php
class CompetitionModel extends MyModel {

    public function __construct() { }

    public function createCompetition($competition) {

        // On stop les autres concours
        $request = MyController::$bdd->exec('UPDATE concours SET stopped = 1, status = 0');

        $request = MyController::$bdd->prepare('INSERT INTO concours 
          (name, status, starting_date, end_date, reward, text_reward) VALUES 
          (?, 0, ?, ?, ?, ?)');

        $request->execute(array(
            $competition['name'],
            $competition['starting_date'],
            $competition['end_date'],
            $competition['reward'],
            $competition['text_reward'],
        ));
    }

    public function tryToStartCompetition() {
        unset($_SESSION['COMPETITION']);
        unset($_SESSION['id_concours']);
        $request = MyController::$bdd->query('SELECT starting_date FROM concours WHERE stopped = 0');
        $result = $request->fetch(PDO::FETCH_ASSOC);

        $today = date('U');
        $start = date('U', strtotime($result['starting_date']));

        if(($start - $today) <= 0) {
            $request = MyController::$bdd->query('SELECT status FROM concours WHERE stopped = 0');
            $result = $request->fetch(PDO::FETCH_ASSOC);
            if($result['status'] != 1) {
                $request = MyController::$bdd->exec('UPDATE concours SET status = 1 WHERE stopped = 0');
                $request = MyController::$bdd->exec('UPDATE users SET participation = 0');
            }
            $request = MyController::$bdd->query('SELECT id_concours FROM concours WHERE status = 1');
            $result = $request->fetch(PDO::FETCH_ASSOC);

            if(!empty($result)) {
                $_SESSION['id_concours'] = $result['id_concours'];
            }

        }
    }

    public function getCompetitionById($id) {
        $request = MyController::$bdd->query('SELECT * FROM concours WHERE id_concours = '.$_SESSION['id_concours']);
        $result = $request->fetch(PDO::FETCH_ASSOC);

        return $result;
    }
}
?>