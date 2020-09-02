<?php

require_once __DIR__ . '/../model/PostManager.php';

class PostController {
	
	/**
	*	List of all users
	*/
	public function index() {
		$postManager = new PostManager();
		$posts = $postManager->getPosts();

		require __DIR__ . '/../view/post/index.php';
	}

	/**
	*	Display a form to create an user and save it in database
	*/
	public function create() {
		
		$postManager = new PostManager();
		//Form has been submitted
		if(isset($_POST['created_by']) && isset($_POST['content'])) {
			$post = new Post();
			//3b. Check the validity of datas
			$post->setCreatedBy($_POST['created_by']);
			$post->setContent($_POST['content']);
			$postManager->createPost($post);

			header('Location: index.php?ctrl=post&action=index');
		}

		//3. Display the form
		require __DIR__ . '/../view/post/create.php';
	}

	/**
	*	Display a form to edit an user and save it in the database
	*/
	public function edit() {
		//1. Select the user
		$id = $_GET['id'] ?? null;
		$postManager = new PostManager();
		$post = $postManager->getPost($id);

        //Form has been submitted
        if(isset($_POST['created_by']) && isset($_POST['content'])) {
			$post->setCreatedBy($_POST['created_by']);
			$post->setContent($_POST['content']);
			$postManager->updatePost($post);
		}

		//2. Prepare the form
		$created_by = $post->getCreatedBy();
		$content = $post->getContent();

		//3. Display the form
		require __DIR__ . '/../view/post/update.php';
	}

	/**
	*	Delete the user in the database
	*/
	public function delete() {
		$id = $_GET['id'] ?? null;
		$postManager = new PostManager();
		$post = $postManager->getPost($id);
		if(isset($post)){
			$postManager->deletePost($id);
			header('Location: index.php?ctrl=post&action=index');
		}
	}

}