<?php
	require "database.php";
	require "helper.php";

	session_start();

	$user = new User($_GET["name"], intval($_GET["points"]), intval($_GET["tapped"]));

	$database = new Database();
	$database->update($user);	
	$database->close();

	updateUserSession($user);
?>
