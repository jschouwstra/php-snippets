<?php
function connectDB(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "movie-theatre";
	$connection = new mysqli($servername, $username, $password, $dbname);

	if ($connection->connect_error){
	    die("Connection failed: " . $connection->connect_error);
	}
	else{
		return $connection;	
	}
}

function fetchSeats(){
	connectDB();
	$sql = "SELECT seats.* FROM seats 
	";
	$result = connectDB()->query($sql);
	while($seats = $result->fetch_assoc()){
		$myArray[] = array(
			'seatNumber' => $seats['seatNumber'],
			'seatAvailable' => $seats['seatAvailable'],
		);
	}
	$myArray[] = array(
		'arrayPosition' => 'end',
	);
	return $myArray;
}

function availableSeats(){
	$seats = fetchSeats();
	while($seat = $seats->fetch_assoc()){
		$myArray[] = array(
			'seatNumber' => $seat['seatNumber'],
		);
	}
	return $myArray;
}
/*--------------------------------------
****************************************
*****	Temporary functions:     *******
****************************************
----------------------------------------*/

function suggestSeats($startingSeatNumber,$quantity) {
	$array = array();
	$currentVisitor = 1;
	for($x=0; $x < $quantity; $x++) {
				$array[] = array(
					'seatNumber' => $startingSeatNumber,
					'currentVisitor' => $currentVisitor
				);
			//echo $startingSeatNumber;
			//echo "visitor: ".$currentVisitor;

			$currentVisitor++;
			$startingSeatNumber++;	
	}	

	return $array;
}
?>