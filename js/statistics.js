import { User } from "./utilities.js";

const totalPoints = document.getElementById("total-points");
const totalTapped = document.getElementById("total-tapped");

let user;

logUser();

function logUser() {
	const url = "/Tap-Tap/php/get-current-user.php";
	fetch(url)
		.then(response => response.text())
		.then(data => {
			user = Object.assign(User.prototype, JSON.parse(data));	

			totalPoints.innerHTML = user.points.toLocaleString();
			totalTapped.innerHTML = user.tapped.toLocaleString();
		});
}

