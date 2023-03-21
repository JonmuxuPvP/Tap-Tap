<?php
	require "php/helper.php";
	session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Tap Tap!</title>
		<link rel="stylesheet" href="./css/style.css">
		<meta name="viewport" content="user-scalable=0">
	</head>
	<body>
		<header class="container">
			<?php
				echo generateHeader();
			?>
		</header>		

		<main class="container">
			<div class="container game">	
				<h1 class="title">Points</h1>
				<p class="points" id="points">0</p>
				<button id="tap" class="button">Tap!</button>
				<p class="tip">Everytime you tap, you win a range random points, try it out!</p>
			</div>
		</main>	

		<footer class="container">
			<p>Created by Jonmuxu 2023</p>	
		</footer>	

		<script type="module" src="script.js"></script>
	</body>
</html>
