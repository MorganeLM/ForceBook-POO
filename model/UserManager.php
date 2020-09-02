<?php

require_once __DIR__ . '/User.php';

/**
*	It's the manager of the User class.
*	All database operations (SELECT INSERT, UPDATE, DELETE, will be performed here)
*/
class UserManager {
	private $pdo;

	public function __construct() {
		$this->pdo = new PDO('mysql:host=localhost;dbname=forcebook', 'root', '');
	}

	private function rowToUser(array $row): User {
		$user = new User();
		$user->setId($row['id']);
		$user->setName($row['name']);
		$user->setEmail($row['email']);

		return $user;
	}

	/**
	*	Update an user in the database
	*/
	public function updateUser(User $user) {
		
		$stmt = $this->pdo->prepare('UPDATE user SET name=:name, email=:email WHERE id = :id');
		$stmt->bindValue(':id', $user->getId(), PDO::PARAM_INT);
		$stmt->bindValue(':name', $user->getName(), PDO::PARAM_STR);
		$stmt->bindValue(':email', $user->getEmail(), PDO::PARAM_STR);
		$stmt->execute();
	}

	/**
	*	Get one user from the database
	*	Return an instance of User or null if not exists
	*/
	public function getUser(int $id): ?User {
		$stmt = $this->pdo->prepare('SELECT * FROM user WHERE id=:id');
		$stmt->bindValue(':id', $id, PDO::PARAM_INT);
		$stmt->execute();

		$row = $stmt->fetch();
		if($row) {
			return $this->rowToUser($row);
		} else {
			return null;
		}
	}

	/**
	*	Get all users from database
	*	Return an array of User
	*/
	public function getUsers(): array {
		$stmt = $this->pdo->query('SELECT * FROM user ORDER BY name');
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		$classUsers = [];
		foreach($rows as $row) {
			$user = $this->rowToUser($row);
			$classUsers[] = $user;
		}

		return $classUsers;
	} 	
}