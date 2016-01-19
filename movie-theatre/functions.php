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

	/* 
		Add an extra array item to prevent skipping the last gap validation.
		We are looking for an open gap when the script meets an unavailable seat,
		When the last gap meets no unavailable seat it skips the gap because of the
		absence of an available seat, that's why there will be a last item added to the array,
		a hoax "unavailable" seat.
	*/
	$myArray[] = array(
		'arrayPosition' => 'end',
	);
	return $myArray;
}
function giveSeatNumbers($startingSeatNumber,$quantity) {
	$array = array();
	$currentVisitor = 1;
	for($x=0; $x < $quantity; $x++) {
		$array[] = array(
			'seatNumber' => $startingSeatNumber,
			'currentVisitor' => $currentVisitor
		);
		$currentVisitor++;
		$startingSeatNumber++;	
	}	

	return $array;
}

// function randomSeatArray($quantity){
// 	$SeatArray = array();
// 	$number = 1;
// 	for($i=1;$i<$quantity+1;$i++){
// 		$SeatArray[] = array(
// 			'seatNumber' => $number,
// 			'seatAvailable' => rand(0,1),
// 		);	
// 		$number++;
// 	}
// 	return $SeatArray;
// }
function showSeats(){
	$seats = fetchSeats();
	array_pop($seats);
	foreach($seats as $seat){
		if($seat['seatAvailable']){
			echo "<span style=\"background-color:green; margin:2px; padding:4px; width: 4px;\">".$seat['seatNumber']."</span>";
		}
		else{
			echo "<span style=\"background-color:red; margin:2px; padding:4px; width: 4px;\">".$seat['seatNumber']."</span>";
		}
	}
}

function orderTickets(){
	/*+++++++++++++++++++++++++++++++
	++++++++ Order tickets ++++++++++
	+++++++++++++++++++++++++++++++*/
	$visitors = $_POST['visitors'];
	if(isset($_POST['ok'])){
		//If there's no value in 
		if($visitors < 1){
			openRowTag(); ?>
			<div class="alert alert-danger">Gelieve een aantal tickets in te voeren.</div>
			<?php closeRowTag();
		}
		else{
			$startingSeatNumber = 0;
			$gap = 0;
			//Fetch the seats from the database
			$seats = fetchSeats();
			$gaps = array();
			foreach($seats as $seat){
				//seat available
				if($seat['seatAvailable']){
					/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
					++++++++ Set the startingSeatNumber and start making the gap ++++
					+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/
					if($gap == 0){
						$startingSeatNumber = $seat['seatNumber'];
					}
					$gap++;
				}
				//seat taken
				else{
					openRowTag();
					//If gap exists
					if($gap > 0){
						//If visitors fit in gap
						if($visitors <= $gap){
							$seatReservation = giveSeatNumbers($startingSeatNumber,$visitors,$gap);
							echo "<p>Aantal tickets: ".$visitors."</p>";
							echo "<p>De volgende stoelen worden u toegewezen:</p>";
							foreach($seatReservation as $seat){
								echo "Stoelnummer: ".$seat['seatNumber']."</br>";
							}
							exit;
						}
						//If the visitors don't fit in the gap
						else{
							//Make array of gaps 
							$gaps[] = array(
								'gapSize' => $gap,
								);
							//And check for the biggest gap

						}
						$gap = 0;
					}
					closeRowTag();
				}
					
			}//End foreach(seats)
			print_r($gaps);
			// 
			$max = max($gaps);
			echo $visitors-$max['gapSize'];
		}
	}
	/*++++++++++++++++++++++++++++++++++++++++++++++++++++
	++++++++ Check if we can place the visitors at all +++
	+++++++++++++++++++++++++++++++++++++++++++++++++++++*/
	if($gap>=$highestGap){ 
		$highestGap=$gap;
	}
	//If the visitors can't fit in the gap of available seats.
	if($highestGap<$visitors){
		openRowTag()
		?>
		<div class="alert alert-danger">Sorry, we hebben niet genoeg zitplaatsen</div>
		

 		<?php				
		closeRowTag();
	}
}

function checkBiggestGap(){

}

function openRowTag(){
	echo "
		<div class=\"container\">
		<div class=\"row\">
		<div class=\"col-md-6\">
		<p>
	";
}
function closeRowTag(){
	echo "
		</p>
		</div>
		</div>
		</div>
	";
}
?>