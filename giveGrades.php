<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');
$id=$_POST['id'];
$year=$_POST['year'];
$sem=$_POST['sem'];

//get total of subjects
$sql = "Select * from subjects where  year_level='".$year."' and semester='".$sem."'";
$res = mysqli_query($conn,$sql);
$total_subjects= mysqli_num_rows($res);

//get # subjects taken
$sql2 = "Select * from qryGrades where  year_level='".$year."' and semester='".$sem."' and student_number='".$id."'";
$res = mysqli_query($conn,$sql2);
$counted = mysqli_num_rows($res);

$percent = ($counted/$total_subjects)*100;

$json=array('TOTAL_SUBJECTS'=>$total_subjects,'TAKEN'=>$counted,'PERCENTAGE'=>$percent,'SQL1'=>$sql,'SQL2'=>$sql2); 
echo json_encode($json);
?>
