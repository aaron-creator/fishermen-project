<?php
if(isset($_POST["name"]))
{
    $name=$_POST["name"];
    $addr=$_POST["address"];
    $mob=$_POST["mobile"];
    $email=$_POST["e-mail"];
    $place=$_POST["place"];
    $username=$_POST["username"];
    $password=$_POST["password"];
$r=array();
$servername="localhost";
$dbusername="root";
$dbpassword="project";
$dbname="studentdb";
$connection = new mysqli($servername,$dbusername,$dbpassword,$dbname);
$sql="INSERT INTO `addfisherman`( `name`, `address`, `mobile`, `email`, `place`, `username`, `password`) VALUES ('$name','$addr','$mob','$email','$place','$username','$password')";
$result= $connection->query($sql);
if($result===TRUE)
{
    $r["status"]="Success";
}
else
{
    $r["status"]="Error";
}
echo json_encode($r);
}
?>
