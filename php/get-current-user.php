<?php
	require "user.php";
	session_start();

	if (isset($_SESSION["user"])) {
		$user = $_SESSION["user"];
		echo $user->toJSON();
	} else {
		echo '{"error":401}';
	}
?>
