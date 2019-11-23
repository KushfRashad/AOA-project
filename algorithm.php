<?php
include_once "database.php";

/*$sql ="INSERT INTO rating(name,rating) VALUES ('Broadway',1)";
if($stmt=mysqli_prepare($link,$sql))
{
	mysqli_stmt_execute($stmt);
	echo "Data inserted";
}
else
echo "Connection error";*/


$sql = "SELECT * FROM rating";


$result = mysqli_query($link,$sql);
$data=array();
if(mysqli_num_rows($result)>0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$data[]=$row;
	}

}
//print_r($data);
$arr1=array();
$arr2=array();
$count=0;
foreach ($data as $rating)
{
	$arr1[$count]= $rating['name'];
	$arr2[$count]= $rating['rating'];
	$count++;
}
/*$review=array();
for ($i=0;$i<$count;$i++)
{
	$review[$arr1[$i]]=$arr2[$i];
}
//arsort($review);
foreach($review as $x => $x_value)
{
	echo $x." ".$x_value;
	echo "<br>";
}*/

//$array = array(20,43,65,88,11,33,56,74);
HeapSort($arr2,$count);
foreach($arr2 as $x)
{
	echo $x;
	echo "<br>";
}
function MaxHeapify(&$data, $heapSize, $index) {
	$left = ($index + 1) * 2 - 1;
	$right = ($index + 1) * 2;
	$largest = 0;

	if ($left < $heapSize && $data[$left] < $data[$index])
	   $largest = $left;
	else
	   $largest = $index;

	if ($right < $heapSize && $data[$right] < $data[$largest])
	   $largest = $right;

	if ($largest != $index)
	{
	   $temp = $data[$index];
	   $data[$index] = $data[$largest];
	   $data[$largest] = $temp;

	   MaxHeapify($data, $heapSize, $largest);
	}
 }

 function HeapSort(&$data, $count) {
	$heapSize = $count;

	for ($p = ($heapSize - 1) / 2; $p >= 0; $p--)
	   MaxHeapify($data, $heapSize, $p);

	for ($i = $count - 1; $i > 0; $i--)
	{
	   $temp = $data[$i];
	   $data[$i] = $data[0];
	   $data[0] = $temp;
	   $heapSize--;
	   MaxHeapify($data, $heapSize, 0);
	}
 }





?>


