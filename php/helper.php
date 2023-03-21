<?php
	require_once "user.php";
	 
	/**
	 * Determines which header should be appended to index.php
	 *
	 * If there's a user logged at the moment, a welcome message will be prompted.
	 * Otherwise, the user will be given the option to log into their account.
	 *
	 * @see index.php
	 **/
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


	/**
	 * Updates the current user in the session variable.
	 *
	 * This function was created to centralize the task of updating the session each time
	 * the user clicks on the tap button.
	 *
	 * @see update-user-data.php, login-user.php
	 **/
	function updateUserSession($user)
	{
		$_SESSION["user"] = $user;
	}

	/**
	 * Clears the current session in progress, effectively logging the user out from their account.
	 *
	 * @see log-user-out.php
	 **/
	function clearSessions() 
	{
		session_unset();
		session_destroy();
	}
?>
