<?php

include "database.php";

abstract class AbstractModel {
	private static $database = null;
	
	function __construct() {
			//$this->database = new Database();
	}
	
	public static function getDatabase() {
    if (self::$database == null) {
      self::$database = new Database();
    }
    return self::$database;
  }
}

?>