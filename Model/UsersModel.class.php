<?php 
	class UsersModel extends MyModel {

		public function __construct() {

		}

		public function addUser($user) {
			$checkExistingUser = self::checkExistingUser($user['id']);

			if(!isset($user['birthday'])) {
				$user['birthday'] = "";
			}else{
				$formatDate = explode('/', $user['birthday']);
				$day = $formatDate[1];
				$month = $formatDate[0];
				$year = $formatDate[2];
				
				$date = $year.'-'.$month.'-'.$day;
			}



			if(!$checkExistingUser) {
				$request = MyController::$bdd->prepare('INSERT INTO users (id_user, name, first_name, email, anniversary, sex, 
				location, status) VALUES (:id_user, :name, :first_name, :email, :anniversary, :sex, :location, :status)');
				$request->execute(array(
					':id_user' => $user['id'],
					':name' => $user['last_name'],
					':first_name' => $user['first_name'],
					':email' => $user['email'],
					':anniversary' => $date,
					':sex' => $user['gender'],
					':location' => $user['locale'],
					':status' => 0
				));
			}else{
				$request = MyController::$bdd->prepare('UPDATE users SET id_user = :id_user, name = :name, first_name = :first_name, 
				email = :email, anniversary = :anniversary, sex = :sex, location = :location, status = :status');
				$request->execute(array(
					':id_user' => $user['id'],
					':name' => $user['last_name'],
					':first_name' => $user['first_name'],
					':email' => $user['email'],
					':anniversary' => $date,
					':sex' => $user['gender'],
					':location' => $user['locale'],
					':status' => 0
				));
			}
		}

		private static function checkExistingUser($id) {
			$request = MyController::$bdd->prepare('SELECT * FROM users WHERE id_user = :id');
			$request->execute(array(
				':id' => $id
			));

			$result = $request->fetch(PDO::FETCH_ASSOC);

			$existingUser = (!empty($result)) ? true : false ;

			return $existingUser;
		}

		public function selectUserById($id) {
		    $request = MyController::$bdd->prepare('SELECT * FROM users WHERE id_user = :id');
		    $request->execute(array(
		        ':id' => $id
            ));
		    $result = $request->fetch(PDO::FETCH_ASSOC);

		    return $result;
        }

        public function setParticipation($id) {
            $request = MyController::$bdd->prepare('UPDATE users SET participation = 1 WHERE id_user = :id');
            $request->execute(array(
                ':id' => $id
            ));
        }

	}
?>