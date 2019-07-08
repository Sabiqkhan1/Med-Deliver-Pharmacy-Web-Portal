<?php

class Routes {
	public $routes;
	
	function __construct() {
		$homeController = new HomeController();
		$this->routes[''] = $homeController;
		$this->routes['home'] = $homeController;
		$this->routes['404'] = new Error404Controller();
		$this->routes['register'] = new RegisterController();
		$this->routes['register/performRegister'] = new RegisterController("register");
		$this->routes['login'] = new LoginController();	
		$this->routes['login/performLogin'] = new LoginController("login");
		$this->routes['logout'] = new LogoutController();
		$this->routes['search'] = new SearchController();
		$this->routes['profile'] = new ProfileController();
		$this->routes['members'] = new MembersController();
		$this->routes['products'] = new ProductController();
		$this->routes['products/amend'] = new ProductAmendController();
		$this->routes['products/performAmend'] = new ProductAmendController("amend");
		$this->routes['products/delete'] = new ProductDeleteController();
		$this->routes['product/insert'] = new ProductCreateController("create");
	}
}

?>