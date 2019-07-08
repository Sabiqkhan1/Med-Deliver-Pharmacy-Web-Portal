<?php

class Database {
	public $PDO;

	function __construct() {
		/** MySQL database details */
		$DB_HOST     = "dragon.kent.ac.uk";
		$DB_NAME = "co600_c37";
		$DB_USERNAME = "co600_c37";
		$DB_PASSWORD = "gsy-ndy";
		
		$this->PDO = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME", $DB_USERNAME, $DB_PASSWORD);
	}
}	
?>