<?php

class RegisterModel extends AbstractModel {
	
	/**
	 * return codes:
	 * 	0: success
	 *	1: failed regex
	 *  2: pdo error
	 *  3: user exists
	 */
	function register($username, $password, $pharmacyID) {
		if (!preg_match('/^[A-Za-z][A-Za-z0-9]{2,12}$/', $username)) {
			return 1;
		}

		$userExists = false;
		$statement = $this->getDatabase()->PDO->prepare("SELECT * FROM pharmacyUsers WHERE username=:username");
		$statement->bindParam(":username", $username);
		if ($statement->execute()) {
			$user = $statement->fetch();
			if($user['username'] == $username) {
				$userExists = true;
			}
		}

		if (!$userExists) {    
			$statement = $this->getDatabase()->PDO->prepare("INSERT INTO pharmacyUsers (username, password, pharmacyID) VALUES (:id, :username, :password, :pharmacyID)");
			$statement->bindParam(":id", $id);
			$statement->bindParam(":username", $username);
			$statement->bindParam(":password", $password);
			$statement->bindParam(":pharmacyID", $pharmacyID);
			if ($statement->execute()) {    
				return 0;
			} else {
				print_r($this->getDatabase()->PDO->errorInfo());
				return 2;
			}
		} else {
			return 3;
		}
	}
	
}
?>