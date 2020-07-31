<?php
if(isset($_POST["name"]))
{
    
    $name=$_POST["name"];
    $mob=$_POST["mobile"];
    $userId=$_POST["userId"];
$r=array();
$servername="localhost";
$dbusername="root";
$dbpassword="project";
$dbname="studentdb";
$connection = new mysqli($servername,$dbusername,$dbpassword,$dbname);
$sql="INSERT INTO `friends`(userId,`name`, `mobile`) VALUES ($userId,'$name','$mob')";
$result= $connection->query($sql);
if($result===TRUE)
{
  $r["status"]="SUCCESS";
    
}
else{
    $r["status"]="error";
    
}
echo json_encode($r);
}
?>