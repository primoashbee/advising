<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');
$sql = "Select distinct YEAR_LEVEL from subjects";
$res = mysqli_query($conn,$sql);
$json  =array();
$rows_count=mysqli_num_rows($res);
while($row = mysqli_fetch_array($res)){
	$json[]=array(
		"YEAR"=>$row['YEAR_LEVEL'],
		"ROWS"=>mysqli_num_rows($res)
	);
}

$sql = "Select distinct SEMESTER from subjects";
$res = mysqli_query($conn,$sql);
while($row1 = mysqli_fetch_array($res)){
	$json[]=array(

		"SEM"=>$row1['SEMESTER'],
		"ROWS"=>mysqli_num_rows($res)
	);
}

echo json_encode($json);
?>