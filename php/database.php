<?php
	require "user.php";

	/**
	 * Represents a SQL's Database in the PDO format
	 **/
	class Database
	{
		private $pdo;
		
		/**
		 * Construts a PDO object by calling this class' private method connect
		 **/
		public function __construct()
		{
			$this->pdo = $this->connect();
		}

		/**
		 * Connects the current PDO instance to MySQL's database
		 *
		 * This method should not be called from outside since it's already being used
		 * by the constructor of this class, hence the private visibility.
		 *
		 * @return pdo - Instance of a PDO object
		 **/
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

		/**
		 * Logs a user into the platform given a name and a password
		 *
		 * If the log is successful, a user object will be returned, otherwise, nothing is return
		 * Knowing this, it's advised to use isset() to check whether the user was properly logged.
		 *
		 * Password encryption/decryption is currently not being used, as this app does not focus on 
		 * cybersecurity. Instead, a raw string match is used to determine the password's authenticity.
		 *
		 * @param - username - A username
		 * @param - password - A password
		 * @return - user - User object given the case that their credentials were correct 
		 **/
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

		/**
		 * Updates the current user's data to the database.
		 *
		 * @param - user - new user data to be updated
		 **/
		public function update($user)
		{
			$statement = "UPDATE user SET points = {$user->getPoints()}, tapped = {$user->getTapped()} WHERE name = '{$user->getName()}';";
			$stmt = $this->pdo->prepare($statement);
			$stmt->execute();
		}

		/**
		 * Closes PDO connection of the current instance.
		 * This method should always be called at the end of this instance's tasks.
		 **/
		public function close()
		{
			$this->pdo = null;
		}
	}

?>
