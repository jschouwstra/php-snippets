<?php
	$visitors = 2;
	$seats = array(
		array(
			'seatAvailable' => '0',
			'seatNumber' => '1'
		),		
		array(
			'seatAvailable' => '0',
			'seatNumber' => '2'
		),		
		array(
			'seatAvailable' => '1',
			'seatNumber' => '3'
		),		
		array(
			'seatAvailable' => '1',
			'seatNumber' => '4'
		),		
		array(
			'seatAvailable' => '1',
			'seatNumber' => '5'
		),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '6'
		// ),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '7'
		// ),		
		// array(
		// 	'seatAvailable' => '0',
		// 	'seatNumber' => '8'
		// ),		
		// array(
		// 	'seatAvailable' => '0',
		// 	'seatNumber' => '9'
		// ),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '10'
		// ),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '11'
		// ),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '12'
		// ),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '13'
		// ),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '14'
		// ),		
		// array(
		// 	'seatAvailable' => '1',
		// 	'seatNumber' => '15'
		// ),
	);
echo "Visitors,X's: ".$visitors;

echo "<ol>";
	foreach($seats as &$val){
		//If not available
		if($val['seatAvailable'] == '0'){
			echo "<li>not available</li>";
		}
		//If available
		elseif($val['seatAvailable'] == '1'){
				for($i=0;$i<$visitors;$i++){
				$val['seatAvailable'] = 'x';
			}
		}			
	}
echo "</ol>";

echo "<pre>";
	print_r($seats);
echo "</pre>";
?>