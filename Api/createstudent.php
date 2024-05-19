<?php
require_once 'connection.php';
header("Content-Type:application/json");
if($_POST['name'] !="" && $_POST['email'] !="" && $_POST['pass'] !="")
{
    $name=$_POST['name'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $pass=$_POST['pass'];
    $sel="select * from tbl_student where email='$email'";
    $electedData=mysqli_query($conn,$sel);
    $tot=mysqli_num_rows($electedData);
    if($tot ==1)
    {
        $re=array(
            'status'=>0,
            'msg'=>'email id alredy exits'
        );
    }
    else{

    $sql="insert into tbl_student(name,email,phone,password) values('$name','$email','$phone','$pass')";
    $result=mysqli_query($conn,$sql);
    if($result)
    {
       header("location:register.php");
    }
 
}

}
else{
    $re=array(
        'status'=>0,
        'msg'=>'Field Not match'
    );
  
}
echo json_encode($re);


?>