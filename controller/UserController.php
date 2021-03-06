<?php

require_once __DIR__ . '/../model/UserManager.php';

class UserController {
	
	/**
	*	List of all users
	*/
	public function index() {
		$userManager = new UserManager();
		$users = $userManager->getUsers();

		require __DIR__ . '/../view/user/index.php';
	}

	/**
	*	Display a form to create an user and save it in database
	*/
	public function create() {
		
		
		//Form has been submitted
		if(isset($_POST['name']) && isset($_POST['email'])) {
			$user = new User();
			//3b. Check the validity of datas
			$user->setName($_POST['name']);
			$user->setEmail($_POST['email']);
			$userManager = new UserManager();
			$userManager->createUser($user);

			header('Location: index.php?ctrl=user&action=index');
		}

		//3. Display the form
		require __DIR__ . '/../view/user/create.php';
	}

	/**
	*	Display a form to edit an user and save it in the database
	*/
	public function edit() {
		//1. Select the user
		$id = $_GET['id'] ?? null;
		$userManager = new UserManager();
		$user = $userManager->getUser($id);

		//Form has been submitted
		if(isset($_POST['name']) && isset($_POST['email'])) {
			//3b. Check the validity of datas
			$user->setName($_POST['name']);
			$user->setEmail($_POST['email']);
			$userManager->updateUser($user);

			header('Location: index.php?ctrl=user&action=index');
		}

		//2. Prepare the form
		$name = $user->getName();
		$email = $user->getEmail();

		//3. Display the form
		require __DIR__ . '/../view/user/edit.php';
	}

	/**
	*	Delete the user in the database
	*/
	public function delete() {
		$id = $_GET['id'] ?? null;
		$userManager = new UserManager();
		$user = $userManager->getUser($id);
		if(isset($user)){
			$userManager->deleteUser($user);
			header('Location: index.php?ctrl=user&action=index');
		}
	}

}