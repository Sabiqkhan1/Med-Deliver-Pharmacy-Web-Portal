<?php

class LogoutModel extends AbstractModel {
	
	function logout() {
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
		$_SESSION = array();
		session_destroy();
	}
	
}

?>