/**
 * Represents a User in the app
 **/
class User {
	constructor(name, points, tapped) {
		this.name = name;
		this.points = points;
		this.tapped = tapped;
	}

	/**
	 * Makes the user click. 
	 * 
	 * A random range of points from one to a hundred will be given.
	 * Tapped times will be accounted as well.
	 *
	 * This method should only be called when the user taps or clicks on the main button.
	 * */
	click() {
		this.points += Math.floor(Math.random() * 100) + 1;
		this.tapped++;
	}
}


/**
 * Determines whether the data passed through parameters 
 * is a valid user to log in or if there was an error
 * such as invalid username/password
 *
 * @param - data - JSON
 * @returns - boolean - true if the JSON was a valid user
 **/
function login(data) {
	const result = JSON.parse(data);
	return !(result.hasOwnProperty("error"));
}

export { User, login };
