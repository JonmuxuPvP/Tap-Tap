import { User, login } from "./js/utilities.js";

const points = document.getElementById("points");
const tapButton = document.getElementById("tap");
const logOutButton = document.getElementById("log-out");

let user;

logUser();

function logUser() {
	const url = "/Tap-Tap/php/get-current-user.php";
	fetch(url)
		.then(response => response.text())
		.then(data => {
			if (login(data)) {
				user = Object.assign(User.prototype, JSON.parse(data));	
			} else {
				user = new User("Guest", 0, 0);
			}
			updatePoints();
		});
}

function updatePoints() {
	points.innerHTML = user.points.toLocaleString();
}

function saveToDatabase() {
	const url = `/Tap-Tap/php/update-user-data.php?name=${user.name}&points=${user.points}&tapped=${user.tapped}`;
	fetch(url);
}

function logOut() {
	const url = `/Tap-Tap/php/log-user-out.php`;
	fetch(url)
		.then(response => response.text())
		.then(data => console.log(data));
}

tapButton.addEventListener("click", (event) => {
	user.click();
	updatePoints();

	if (user.name != "Guest") {
		saveToDatabase();
	}
});

if (logOutButton != null) {
	logOutButton.addEventListener("click", (event) => {
		logOut();
		window.location.href = "index.php";
	});
}


