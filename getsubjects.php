<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');
$sql = "Select * from subjects";
$res = mysqli_query($conn,$sql);

$json  =array();
$rows_count=mysqli_num_rows($res);
while ($row=mysqli_fetch_array($res)){
	$json[] =array(
	"TITLE" => $row[1],
	"CODE" => $row[2],
	"PRE"=>$row[3],
	"LEC"=>$row[4],
	"LAB"=>$row[5],
	'ROWS'=>$rows_count
	);
}

echo json_encode($json);
?>
