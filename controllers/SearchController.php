<?php

class SearchController extends AbstractController {
	
	function getView() {
		if(!$this->getSession()->isLoggedIn()) {
			return "login-required.php";
		}
		return "search/index.php";
	}
	
	function getData() {
		if(!isset($_GET['name'])) {
			$results['counter'] = 0;
			$results['results'] = array();
			return $results;
		}
				
		$search = new SearchModel();
		$results = $search->getResults($_GET['name']);
		$data['results'] = $results;
		$data['counter'] = sizeof($results);
		return $data;
	}
	
}

?>