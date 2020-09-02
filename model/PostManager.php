<?php

require_once __DIR__ . '/Post.php';

/**
*	It's the manager of the Post class.
*	All database operations (SELECT INSERT, UPDATE, DELETE, will be performed here)
*/
class PostManager {
	private $pdo;

	public function __construct() {
		$this->pdo = new PDO('mysql:host=localhost;dbname=forcebook', 'root', '');
	}

	private function rowToPost(array $row): Post {
		$post = new Post();
		$post->setId($row['id']);
        $post->setCreatedBy($row['created_by']);
        $post->setContent($row['content']);
        $post->setCreatedAt(new DateTime($row['created_at']));

		return $post;
	}

	/**
	*	Create a post in the database
	*/
	public function createPost(Post $post) {
		
		$stmt = $this->pdo->prepare('INSERT INTO `post`(`created_by`, `content`) VALUES (:created_by, :content)');
		$stmt->bindValue(':created_by', $post->getCreatedBy(), PDO::PARAM_INT);
		$stmt->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
		$stmt->execute();
	}

	/**
	*	Delete an user in the database
	*/
	public function deletePost(int $id) {
		
		$stmt = $this->pdo->prepare('DELETE FROM `post` WHERE id = :id');
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();
	}

	/**
	*	Update an user in the database
	*/
	public function updatePost(Post $post) {
		
		$stmt = $this->pdo->prepare('UPDATE post SET created_by=:created_by, content=:content WHERE id = :id');
		$stmt->bindValue(':id', $post->getId(), PDO::PARAM_INT);
		$stmt->bindValue(':created_by', $post->getCreatedBy(), PDO::PARAM_INT);
		$stmt->bindValue(':content', $post->getContent(), PDO::PARAM_STR);
		$stmt->execute();
	}

	/**
	*	Get one user from the database
	*	Return an instance of User or null if not exists
	*/
	public function getPost(int $id): ?Post {
		$stmt = $this->pdo->prepare('SELECT * FROM post WHERE id=:id');
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		if($row) {
			return $this->rowToPost($row);
		} else {
			return null;
		}
	}

	/**
	*	Get all users from database
	*	Return an array of User
	*/
	public function getPosts(): array {
		$stmt = $this->pdo->query('SELECT * FROM post ORDER BY id');
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$classPosts = [];
		foreach($rows as $row) {
			$post = $this->rowToPost($row);
			$classPosts[] = $post;
		}

		return $classPosts;
	} 	
}