<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');
$sql = "Select * from subjects";
$res = mysqli_query($conn,$sql);

$json  =array();
$rows_counnt=mysqli_num_rows($res);
while ($row=mysqli_fetch_array($res)){
	$json[] =array(
	"CODE" => $row[1],
	"TITLE" => $row[2],
	'ROWS'=>$rows;
	);
}

echo json_encode($json);
?>
