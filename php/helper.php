<?php
	require_once "user.php";
	
	function generateHeader()
	{
		if (isset($_SESSION["user"])) {
			$user = $_SESSION["user"];
			$result = '
				<a href="statistics.php">Statistics</a>
				<p>
					Welcome back ' . $user->getName() . ', <a href="#" id="log-out">Log out</a>
				</p>
			';
		} else {
			$result = '
				<p>
					You have an account? Log in <a href="form.php">here</a>
				</p>
			';
		}

		return $result;
	}

	function updateUserSession($user)
	{
		$_SESSION["user"] = $user;
	}

	function clearSessions() 
	{
		session_unset();
		session_destroy();
	}


?>
