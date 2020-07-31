<?php
if(isset($_POST["username"]))
{

    $name=$_POST["username"];
    $pass=$_POST["password"];
$r=array();
$servername="localhost";
$dbusername="root";
$dbpassword="project";
$dbname="studentdb";
$connection = new mysqli($servername,$dbusername,$dbpassword,$dbname);
$sql="SELECT `id`,`name`, `address`, `mobile`, `email`, `place`, `username`, `password` FROM `addfisherman` WHERE `username`='$name' AND`password`='$pass'";
$result= $connection->query($sql);
if($result->num_rows>0)
{
    $r["status"]="SUCCESS";
    while($row=$result->fetch_assoc())
    {
        $r["uid"]=$row["id"];
    }
}
else
{
   $r["status"]="ERROR";
}
echo json_encode($r);
}
?>
