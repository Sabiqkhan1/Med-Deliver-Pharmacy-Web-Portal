<?php

class UserModel extends AbstractModel {
	
	function getUser($query) {			
		$profileId = $query;
		$statement = $this->getDatabase()->PDO->prepare("SELECT * FROM pharmacyUsers WHERE id=:userId");
		$statement->bindParam(":userId", $profileId);
		$statement->execute();
		$user = $statement->fetch();
		$targetUsername = $user['username'];
		$data['username'] = $targetUsername;
		return $data;
	}
	
}
?>