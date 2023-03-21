<?php
	require "user.php";

	class Database
	{
		private $pdo;

		
		public function __construct()
		{
			$this->pdo = $this->connect();
		}

		private function connect()
		{
			$server = "localhost";
			$name = "test";
			$user = "root";
			$password = "";

			$pdo;
			$connection = "mysql:host=$server;dbname=$name";

			try {
				$pdo = new PDO($connection, $user, $password);
				$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
			} catch (PDOException $exception) {
				echo $exception;
			}

			return $pdo;
		}

		public function login($username, $password) 
		{
			$statement = "SELECT * FROM user WHERE name = '$username'";
			$stmt = $this->pdo->prepare($statement);
			$stmt->execute();

			$row = $stmt->fetch();

			if ($row["name"]) {
				if ($password == $row["password"]) {
					$user = new User($row["name"], $row["points"], $row["tapped"]);
					return $user;
				}
			}
		}

		public function update($user)
		{
			$statement = "UPDATE user SET points = {$user->getPoints()}, tapped = {$user->getTapped()} WHERE name = '{$user->getName()}';";
			$stmt = $this->pdo->prepare($statement);
			$stmt->execute();
		}

		public function close()
		{
			$this->pdo = null;
		}

	}

?>
