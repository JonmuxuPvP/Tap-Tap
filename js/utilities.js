
class User {
	constructor(name, points, tapped) {
		this.name = name;
		this.points = points;
		this.tapped = tapped;
	}

	click() {
		this.points += Math.floor(Math.random() * 100) + 1;
		this.tapped++;
	}
}

function login(data) {
	const result = JSON.parse(data);
	return !(result.hasOwnProperty("error"));
}

export { User, login };
