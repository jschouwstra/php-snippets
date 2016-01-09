<?php
// Report all errors except E_NOTICE
error_reporting(E_ALL & ~E_NOTICE);
include "functions.php";
connectDB();
$array = fetchSeats();
$visitors = 3;
$startingSeatNumber = 0;
$gap = 0;
foreach($array as $seat){
	//seat available
	if($seat['seatAvailable']){
		if($gap == 0){
			$startingSeatNumber = $seat['seatNumber'];
		}
		$gap++;
	}
	//seat taken
	else{
		echo "<b>gap: ".$gap."</b>";
		if($gap > 0){
			if($visitors <= $gap){
				$array = giveSeatNumbers($startingSeatNumber,$visitors);
				echo "Your assigned seats: ";
				foreach($array as $seat){
					echo "Seat: ".$seat['seatNumber'];
				}
				exit;
			}
			$gap = 0;
		}
	}

	echo "Seat: ".$seat['seatNumber']." Gap size".$gap."</br>";


}
echo "<pre>";
print_r($array);
echo "</pre>";




