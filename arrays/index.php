<?php
//Functions to lookup:
// unset()
// reset()
// json_decode()
// array_walk_recursive()


// array_splice():
// Sets new value from key to key, e.g: 
// $a1=array("a"=>"red","b"=>"green","c"=>"blue","d"=>"yellow");
// $a2=array("a"=>"purple","b"=>"orange");
// array_splice($a1,0,2,$a2);
// print_r($a1);

//1
$color = array('white', 'green', 'red', 'blue', 'black');

echo "The memory of that scene for me is like a frame of 
film forever frozen at that moment: the red $color[2] carpet, the green".$color['1']." lawn, 
the white ".$color['0']." house, the leaden sky. The new president and his first lady. - Richard M. Nixon"
?>

</br>
<?php
//2
$color = array('white','green','red');
sort($color);
echo "<ul>";
foreach($color as $item){
	echo "<li>$item</li>";
}
echo "</ul>";
?>

<?php
//3
//Create a PHP script which display the capital and country name 
//from the above array $ceu. Sort the list by the name of the country.
$ceu = array( "Italy"=>"Rome", "Luxembourg"=>"Luxembourg", "Belgium"=> "Brussels", "Denmark"=>"Copenhagen", "Finland"=>"Helsinki", "France" => "Paris", "Slovakia"=>"Bratislava", "Slovenia"=>"Ljubljana", "Germany" => "Berlin", "Greece" => "Athens", "Ireland"=>"Dublin", "Netherlands"=>"Amsterdam", "Portugal"=>"Lisbon", "Spain"=>"Madrid", "Sweden"=>"Stockholm", "United Kingdom"=>"London", "Cyprus"=>"Nicosia", "Lithuania"=>"Vilnius", "Czech Republic"=>"Prague", "Estonia"=>"Tallin", "Hungary"=>"Budapest", "Latvia"=>"Riga", "Malta"=>"Valetta", "Austria" => "Vienna", "Poland"=>"Warsaw");

echo "<ol>";
	// $ceu as $key => $value
foreach($ceu as $country => $capital){
	echo "<li>The capital of $country is $capital</li>";

}
echo "</ol>";

?>

<?php
//4
//Delete an element from an array 

$x = array(1, 2, 3, 4, 5);  
var_dump($x);  
unset($x[3]);  
$x = array_values($x);  

echo "<pre>";
var_dump($x);  
echo "</pre>";


?>

<?php
//5
//Write a PHP script to get the first element of the above array.
$color = array(4 => 'white', 6 => 'green', 11=> 'red');  
echo reset($color);  

?>
<br />


<ol>
	<?php
	//6
	// Write a PHP script which decode the following JSON string.
function getJson($value,$key)  
{  
	echo "<li>$key : $value</li>";  
}  
$a = '
{
	"Title": "The Cuckoos Calling",  
	"Author": "Robert Galbraith",  
	"Detail":  {   
		"Publisher": "Little Brown"  
	 }  
 }';  
$jsonString = json_decode($a,true);  
array_walk_recursive($jsonString,"getJson");  
?> 
</ol>
<div class="active">
<?php
//7
// Write a PHP script that insert a new item in an array on any position. 

//the array
$numbers = array( '1','2','3','4','5' );  

echo 'numbers array : <br>';  

//loop through the numbers array
foreach ($numbers as $x)   
{
	echo "$x ";
}  
$insert = 'Y';  
//array_splice — Remove a portion of the array and replace it with something else
array_splice( $numbers, 3, 0, $insert );   
echo " <br> After inserting 'Y' the array is :<br>";  
foreach ($numbers as $x)   
{echo "$x ";}  
?>
</div>

<ol>

<?php
// for loops

//Sixteen items

//	start with x being 1
// 	run the loop if the value is lower then x
//	increment x by 1
for ($x=1; $x<=10; $x++){
  echo "<li>Item $x </li>";
}
?>
</ol>
<?php
//8
/* 
	Write a PHP script to sort the following associative array : Go to the editor
	array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40") in
	a) ascending order sort by value b) ascending order sort by Key
	c) descending order sorting by Value
	d) descending order sorting by Key
*/ 
echo "Associative array : Ascending order sort by value";  
$array1 = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40"); asort($array1);  
echo "<ol>";
foreach($array1 as $y=>$y_value)  {  
	echo "<li>Age of ".$y." is : ".$y_value."</li>" 
	;  
}  
echo "</ol>";


echo "  
Associative array : Ascending order sort by Key  
";  
echo "<ol>";

foreach($array1 as $y=>$y_value)  {  
	echo  
	"<li>Age of ".$y." is : ".$y_value."</li>"  
	;  
}  
echo "</ol>";


echo "  
Associative array : Descending order sorting by Value  
";  
$age = array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40");  
arsort($age);  
echo "<ol>";

foreach($age as $y=>$y_value)  {  
	echo "<li>Age of ".$y." is : ".$y_value."</li>"  
	;  
}  
echo "</ol>";

echo "  
Associative array : Descending order sorting by Key  
";  
echo "<ol>";
$array4=array("Sophia"=>"31","Jacob"=>"41","William"=>"39","Ramesh"=>"40"); krsort($array4);  
foreach($array4 as $y=>$y_value)  {  
	echo "<li>Age of ".$y." is : ".$y_value."</li>"  
	;  
}   
echo "</ol>";


?>
<?php
//9
$month_temp = "78, 60, 62, 68, 71, 68, 73, 85, 66, 64, 76, 63, 81, 76, 73,  
68, 72, 73, 75, 65, 74, 63, 67, 65, 64, 68, 73, 75, 79, 73";  
$temp_array = explode(',', $month_temp);  
$tot_temp = 0;  
$temp_array_length = count($temp_array);  
foreach($temp_array as $temp)  
{  
	$tot_temp += $temp;  
}  
$avg_high_temp = $tot_temp/$temp_array_length;  
echo "Average Temperature is : ".$avg_high_temp."  
";   
sort($temp_array);  
echo "<br> List of five lowest temperatures : ";  
for ($i=0; $i< 5; $i++)  
{   
	echo $temp_array[$i].", ";  
}  
echo "<br>List of five highest temperatures : ";  
for ($i=($temp_array_length-5); $i< ($temp_array_length); $i++)  
{  
	echo $temp_array[$i].", ";  
}  
?>