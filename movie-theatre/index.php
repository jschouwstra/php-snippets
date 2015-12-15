<?php
function DBConnect(){
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

function giveSeatNumbers($visitors){
	/*
		within the list from db,find a gap and try to fit the visitors in the seats array, 
		each visitor must get one seat, if available, starting with the lowest value.
	*/
	//assign seats to the visitors:		
	$seats = array();
	echo "<ol>";
	for($x = 1; $x < $visitors+1; $x++){
		array_push($seats,$x);
	}
	echo "</ol>";			

}

function getSeats(){
	DBConnect();
	$sql = "SELECT seats.* FROM seats 
	WHERE seats.Available = 1;
	";
	$result = DBConnect()->query($sql);
	return $result;
}


$seats = getSeats();
echo "<p>Seats from database:</p>";
for($x=0; $x<5; $x++){
	while($seat = $seats->fetch_assoc()) {
		echo '<span style="border:1px solid black;padding:10px;margin:1px;">'.$seat['seatNumber'].'</span>';
	}
}

//This is where I define the number of visitors
$quantityVisitors = 10;
giveSeatNumbers($quantityVisitors);
?>
<p>
	Quantity of tickets ordered: <?php echo $quantityVisitors;?>
</p>
<p>
	The following seats will be assigned to you:
</p>




