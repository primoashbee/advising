<?php 
require "config.php";
header('Allow-Control-Access-Origin:*');
header('Content-Type: application/json');
$username = $_POST['username'];
$pass = $_POST['password'];
$sql = "Select * from accounts where username='".$username."' and password = '".$pass."'";
if(mysqli_num_rows(mysqli_query($conn,$sql))){
	$status="Meron";
}else {
	$status = "Wala";
	
}


$var  =array('status'=>$status,'username'=>$username);

echo json_encode($var);
?>