<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');

$id=$_POST['id'];
$year=$_POST['year'];
$sem=$_POST['sem']; 


//get subjects with grades by student
$sql = "Select * from qryGrades where  year_level='".$year."' and semester='".$sem."' and student_number='".$id."' order by year_level ASC";
$res = mysqli_query($conn,$sql);
$subs_taken = array();
$ctr=0;
$json = array();
$taken =array();
while($data=mysqli_fetch_array($res)){
//$subs_taken[]=array('TITLE'=>$data['TITLE']);
$taken[]=array('TITLE'=>$data['TITLE']);
$ctr++;
}

//get subject per year and sem
$sql = "Select * from subjects where  year_level='".$year."' and semester='".$sem."' order by year_level ASC	";
$res = mysqli_query($conn,$sql);
$subjects = array();
$ctr=0;
while($data=mysqli_fetch_array($res)){
$subjects[]=array('TITLE'=>$data['TITLE']);
$ctr++;
}

//index 0 to N ng subjects
$json[]= array('TAKEN'=>$taken,'NOT'=>(array_values(array_diff_key($subjects,$taken))));
echo json_encode($json[0]);
?>
