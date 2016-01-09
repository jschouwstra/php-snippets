<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
include "functions.php";
connectDB();
//$seatsAvailable = [];
$seatReservation = [];
$gap = 0;
$visitors = 3;
// $start = 0;
$seatNumber = ""; 
$seats = fetchSeats();
echo "<h2>".$visitors." visitors</h2>";
while($seat = $seats->fetch_assoc()){
	//seat available
	if($seat['seatAvailable']){
		//when there's no gap set the current seatnumber and increment the gap size
		//so we know how much capacity there is for the visitors.
		if($gap == 0){
			$seatNumber = $seat['seatNumber'];
		}
		$gap++;
	}
	//seat taken
	else{
		//If there's a gap
			if($gap > 0){	
				//If the quantity of visitors fit in the gap
				if($visitors <= $gap){
					echo "it fits";
					suggestSeats($seatNumber,$visitors);
					echo "<strong>Seat: ".$seatNumber. "(gap size: ".$gap. ")</strong></br>";
				}
				// $start = 1;
				$gap = 0;
				//$seatNumber = "";
			}
	}
}

if($gap > 0) {
	if($visitors <= $gap){
		echo "it fits";
		//suggestSeats($seatNumber,$visitors);
		echo "<strong>Seat: ".$seatNumber. "(gap size: ".$gap. ")</strong></br>";

	}
	//echo "<strong>Seat: ".$seatNumber. "(gap size: ".$gap. ")</strong>";
}
$array = suggestSeats($seatNumber,$visitors);

echo "<pre>";
print_r($array);
echo "</pre>";
echo "<ul>";
foreach($array as $reservation){
	echo "<li>seatNumber: ".$reservation['seatNumber']."</li>";
	echo "Visitor: ".$reservation['currentVisitor']."</li>";
}
echo "</ul>";

?>