<?php 
require "config.php";
header('Content:apllication/json');
header('Allow-Control-Access-Origin:*');

$studentID=$_POST['id'];
$year=$_POST['year'];
$sem=$_POST['sem'];
/*
$studentID='201110590';
$year='1st Year';
$sem='2nd Sem';
*/
$sql="SELECT s.*, CASE WHEN avail.passed IS NULL THEN FALSE ELSE avail.passed END AS passed FROM subjects s LEFT JOIN 
(
SELECT x.Id,x.title,SUM(passed) = qrc.ReqCount AS passed, student_id, qrc.`ReqCount` FROM (
SELECT s.Id,s.Title,S.Code,pr.pre_req,g.`GRADE`, g.Student_Id, CASE WHEN grade IS NULL OR grade > 3 THEN FALSE ELSE TRUE END AS passed FROM subjects s
LEFT JOIN pre_req pr ON pr.Subject_code = s.COde
LEFT JOIN grades g ON g.`SUBJECT_ID` = pr.pre_req) AS X
LEFT JOIN qryreqcount qrc ON x.Id = qrc.`Id`
WHERE STUDENT_ID IS NOT NULL AND Student_Id = '" .$studentID."' 
GROUP BY id, student_id,Title) AS avail
ON avail.Id = s.Id WHERE s.YEAR_LEVEL = '" .$year. "'  AND s.SEMESTER = '".$sem."' and avail.passed is true" ;
$res=mysqli_query($conn,$sql);
$lists=array();
while($data=mysqli_fetch_array($res)){
$lists[]=array('CODE'=>$data['CODE'],'TITLE'=>$data['TITLE']);	
}
$json[0] = array('SUBJECTS'=>$lists);
echo json_encode($json[0]);
?>
