<?php
	session_start();

	require "database.php";
	require "helper.php";

	$username = $_GET["username"];
	$password = $_GET["password"];

	$database = new Database();

	$user = $database->login($username, $password);

	if ($user) {
		updateUserSession($user);
		echo $user->toJSON();
	} else {
		echo '{"error":401}';
	}

	$database->close();
?>
