<?php

/*
*	main index.php file.
* 	Do the routing between the request and the good controller
*/

require_once __DIR__ .'/controller/HomeController.php';
require_once __DIR__ .'/controller/UserController.php';
require_once __DIR__ .'/controller/PostController.php';


$ctrl = $_GET['ctrl'] ?? 'home';
$action = $_GET['action'] ?? 'index';

switch($ctrl) {
	case 'home':
		$controller = new HomeController();
		$controller->index();
	break;
	case 'user':
		$controller = new UserController();
		switch($action) {
			case 'index':
				$controller->index();
			break;
			case 'create':
				$controller->create();
			break;
			case 'edit':
				$controller->edit();
			break;
			case 'delete':
				$controller->delete();
			break;
		}
	break;
	case 'post':
		$controller = new PostController();
		switch($action) {
			case 'index':
				$controller->index();
			break;
			case 'create':
				$controller->create();
			break;
			case 'edit':
				$controller->edit();
			break;
			case 'delete':
				$controller->delete();
			break;
		}
	break;
	default:
		http_response_code(404);
		'Echo 404 not found';
	break;
}