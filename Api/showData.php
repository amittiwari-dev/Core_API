<?php
require_once 'connection.php';
header("Content-Type:application/json");

$selectData="select * from tbl_student";
$resultData=mysqli_query($conn,$selectData);
while($fetch=$resultData->fetch_assoc())
{
    $student[]=$fetch;
}
$re=array(
    'status'=>1,
    'details'=>$student
);
echo json_encode($re);



?>