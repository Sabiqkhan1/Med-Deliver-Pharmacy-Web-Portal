<?php

class LoginModel extends AbstractModel {
	
	function login($username, $password) {
		$validUser = false;
		$userId;
		$pharmacyId;

		$statement = $this->getDatabase()->PDO->prepare("SELECT * FROM pharmacyUsers WHERE username=:username AND password=:password");
		$statement->bindParam(":username", $username);
		$statement->bindParam(":password", $password);

		if ($statement->execute()) {
			$result = $statement->fetch();
			$userId = $result['id'];
			$pharmacyId = $result['pharmacyID'];
			if($userId > 0) {
				$validUser = true;
			}
		}
				
		if ($validUser) {
			$_SESSION["loggedIn"] = true;
			$_SESSION["userId"] = $userId;
			$_SESSION["pharmacyId"] = $pharmacyId;
			return true;
		}
		
		return false;
	}
	
	
}
?>