<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');
$username = $_POST['ID'];
$sql = "Select * from qryInformation where username='".$username."'";
if(mysqli_num_rows(mysqli_query($conn,$sql))){
	$data = mysqli_fetch_array(mysqli_query($conn,$sql));
	$lname=$data['LAST_NAME'];
	$mname=$data['MIDDLE_NAME'];
	$fname=$data['FIRST_NAME'];
	$course=$data['COURSE'];
}else {
	
}


$var  =array('lname'=>$lname,'mname'=>$mname,'fname'=>$fname,'course'=>$course);

echo json_encode($var);
?>