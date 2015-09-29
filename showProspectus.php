<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');
$sql = "Select * from qryProspectus";
$res = mysqli_query($conn,$sql);

$json  =array();
$subs=array();
$rows_count=mysqli_num_rows($res);
while ($row=mysqli_fetch_array($res)){
	$subs[] =array(
	"TITLE" => $row[1],
	"CODE" => $row[2],
	"PRE"=>$row[3],
	"LEC"=>$row[4],
	"LAB"=>$row[5],
	"YEAR_LEVEL"=>$row[6],
	"SEM"=>$row[7],
	"GRADE"=>$row[10],
	'ROWS'=>$rows_count
	);
}
$json= array('SUBJECTS'=>$subs);
echo json_encode($json);
?>
