var view = {
	// Takes a string message and 
	// displays it in the message display area.
	displayMessage: function(msg) {
		var messageArea = document.getElementById("messageArea");
		messageArea.innerHTML = msg;
	},
	
	// Takes the location where the user
	// missed the ship and inserts
	// miss png into grid 
	displayMiss: function(location) {
		var cell = document.getElementById(location);
		cell.setAttribute("class", "miss");
	},
	
	// Takes the location where the user
	// hit the ship and inserts
	// ship png into grid 
	displayHit: function(location) {
		var cell = document.getElementById(location);
		cell.setAttribute("class", "hit");
	}
}

var model = {
	boardSize: 7,
	numShips: 3,
	shipsSunk: 0,
	shipLength: 3,
	
	ships: [{ locations: [0, 0, 0], hits: ["", "", ""] },
			{ locations: [0, 0, 0], hits: ["", "", ""] },
			{ locations: [0, 0, 0], hits: ["", "", ""] }],
	
	generateShipLocations:function() {
		var locations;
		for(var i=0; i < this.numShips; i++)
		{
			do {
				locations = this.generateShip();
			}
			while(this.collision(locations));
			this.ships[i].locations = locations;
		}
		
	},
	
	generateShip:function() {
		var direction = Math.floor(Math.random() * 2);
		var row = 0;
		var col = 0;
		if(direction === 1)
		{
			row = Math.floor(Math.random() * this.boardSize);
			col = Math.floor(Math.random() * (this.boardSize - (this.shipLength + 1)));
			console.log(col);
		} 
		else {
			row = Math.floor(Math.random() * (this.boardSize - (this.shipLength + 1)));
			col = Math.floor(Math.random() * this.boardSize);
		}
		
		var newShipLocations = [];
		
		for(var i =0; i < this.shipLength; i++)
		{
			if(direction === 1)
			{
				newShipLocations.push(row + "" + (col + i));
			}
			else {
				newShipLocations.push((row + i) + "" + col);
			}
		}
		return newShipLocations;
	},
	
	collision: function(locations) {
		for(var i = 0; i < this.numShips; i++)
		{
			var ship = model.ships[i];
			for(var j =0; j < locations.length; j++)
			{
				if(ship.locations.indexOf(locations[j]) >= 0)
				{
					return true;
				}
			}
		}
		return false;
	},
			
	fire: function(guess) {
		for(var i =0; i < this.numShips; i++) {
			var ship = this.ships[i];
			var locations = ship.locations;
			var index = locations.indexOf(guess);
			
			if(index >= 0)
			{
				// Ship has been hit
				ship.hits[index] = "hit";
				
				view.displayHit(guess);
				view.displayMessage("HIT!");
				
				if(this.isSunk(ship)) {
					view.displayMessage("You sank my battleship!");
					this.shipsSunk++;
				}
				return true;
			}
		}
		
		view.displayMiss(guess);
		view.displayMessage("You missed.");
		
		return false;
	},
	
	isSunk: function(ship) {
		for(var i =0; i < this.shipLength; i++) {
			if(ship.hits[i] != "hit") {
				console.log("Ship has not been sunk");
				return false;
			}
		}
		return true;
	}
}
// Test Case 1

/*
model.fire("53"); // miss
model.fire("06"); // hit
model.fire("16"); // hit
model.fire("26"); // hit
model.fire("34"); // hit
model.fire("24"); // hit
model.fire("44"); // hit
model.fire("12"); // hit
model.fire("11"); // hit
model.fire("10"); // hit
*/

var controller = {
	guesses: 0,
	letters: ["A", "B", "C", "D", "E", "F", "G"],
	
	processGuess:function(guess)
	{
		
		var location = parseGuess(guess);
		// Returns false after second attempt
		if (location)
		{
			this.guesses++;
			var hit = model.fire(location);
			if(hit && model.shipsSunk === model.numShips)
			{
				view.displayMessage("You sunk my battleships in " +
				this.guesses + " guesses. I hope you are happy.");
			}
		}
	}
	
}

function init() 
{
	var fireButton = document.getElementById("fireButton");
	fireButton.onclick = handleFireButton;
	model.generateShipLocations();
}

function handleFireButton()
{
	var guessInput = document.getElementById("guessInput");
	var guess = guessInput.value;
	controller.processGuess(guess);
	guessInput.value = "";
}

window.onload = init;

function parseGuess(guess)
{
		var code = guess.charCodeAt(0);
		// Check if the guess is exactly length of 2
		var parsedGuess = "";
		var letters = ["A", "B", "C", "D", "E", "F", "G"];
		var charFound = false;
		
		if(guess.length != 2)
		{
			console.log("Guess is not length of 2");
			return false;
		}
		// Check if the guess is empty
		if(!guess.length)
		{
			console.log("Nothing is in guess");
			return false;
		}
		// Check if the first letter is part of the alphabet
		if ( (!(code >= 65) && !(code <= 90)) || (!(code >= 97) && !(code <= 122))) {
			console.log("Guess is not apart of the alphabet");
  			return false;
		}
		for(var i = 0; i< letters.length; i++)
		{
			if(guess[0].toUpperCase() == letters[i])
			{
				parsedGuess = i.toString();
				charFound = true;
				break;
			}
		}
		
		// Users first character was outside the A-G range
		if(!charFound)
		{
			console.log("First character of guess was outside A-G range");
			return false;
		}
		// Users second character was outside of the 0-6 range
		if(guess[1] < 0 || guess[1] > 6)
		{
			console.log("Second character of guess was outside 0-6 range");
			return false;
		}
		
		parsedGuess += guess[1];
		console.log(parsedGuess);
		return parsedGuess;
}


// Test case 2
/*
console.log(parseGuess("a0"));
console.log(parseGuess("B6"));
console.log(parseGuess("G3"));
console.log(parseGuess("H0"));
console.log(parseGuess("A7"));
*/

// Test case 3
/*
controller.processGuess("A0");

controller.processGuess("A6");
controller.processGuess("B6");
controller.processGuess("C6");

controller.processGuess("C4");
controller.processGuess("D4");
controller.processGuess("E4");

controller.processGuess("B0");
controller.processGuess("B1");
controller.processGuess("B2");
*/