<?php

	//use float or else php will make it 7
	echo (float) ((0.1 + 0.7) * 10); // expected and correct result: 8
	$string = (string) 123;// string 123
	echo $string;	
?>
<br>
<?php
	$string = (string) "1";

	if(is_string($string)){
		echo "string";
	}
?>

<br>

<?php
	echo 23 % 7;
?>
<br>
<?php
	for($i=0+1; $i<20; $i++){
		echo "Level: ". $i."&nbsp; Experience needed for next level: ". 2 ** $i."<br/>";
	}

?>
<br>

<?php
	$x = 0;
	echo ~$x; // -1
?>
<br>

<?php
$a = 11;
	echo $a == 10;

	echo 10 == $a;
?>
<br>

<?php
	$a = `ls -l`;
	return $a;
?>



