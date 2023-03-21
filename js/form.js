import { login } from "./utilities.js";

const username = document.getElementById("username");
const password = document.getElementById("password");

const submit = document.getElementById("submit");
const loginResult = document.getElementById("login-result");

submit.addEventListener("click", (event) => {
	event.preventDefault();

	const url = `/Tap-Tap/php/login-user.php?username=${username.value}&password=${password.value}`;
	
	fetch(url)
		.then(response => response.text())
		.then(data => {
			if (login(data)) {
				window.location.href = "index.php";
			} else {
				loginResult.innerHTML = "Invalid username or password";	
			}
		});
});
