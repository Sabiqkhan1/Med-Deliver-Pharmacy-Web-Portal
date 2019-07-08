<?php

class SessionModel extends AbstractModel {
	
	function userExists($userId) {
		$statement = $this->getDatabase()->PDO->prepare("SELECT id FROM pharmacyUsers WHERE id=:userId");
    $statement->bindParam(":userId", $userId);
    $statement->execute();
    return $statement->fetch();
	}
	
	function getUser($userId) {
		$statement = $this->getDatabase()->PDO->prepare("SELECT * FROM pharmacyUsers WHERE id=:userId");
    $statement->bindParam(":userId", $userId);
    $statement->execute();
    return $statement->fetch();
	}
	
	function isLoggedIn() {
		return (isset($_SESSION["loggedIn"]) && isset($_SESSION["userId"])) && $this->userExists($_SESSION["userId"]);
	}
}

?>