<p>We are going to flip a coin until we get three heads in a row!</p>
<?php
$headCount = 0;
$flipCount = 0;
while ($headCount < 3) {
	$flip = rand(0,1);
	$flipCount ++;
	if ($flip){
		$headCount ++;
		echo "<div>H</div>";
	}
	else {
		$headCount = 0;
		echo "<div>T</div>";
	}
}
echo "<p>It took {$flipCount} flips!</p>";
?>

<?php
$flipCount = 0;
do {
	$flip = rand(0,1);
	$flipCount ++;
	if ($flip){
		echo "<div>H</div>";
	}
	else {
		echo "<div>T</div>";
	}
} while ($flip);
$verb = "were";
$last = "flips";
if ($flipCount == 1) {
	$verb = "was";
	$last = "flip";
}
echo "<p>There {$verb} {$flipCount} {$last}!</p>";
?>