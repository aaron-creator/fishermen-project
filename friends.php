<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST">
<table class="table">
    <tr>
        <td> Name </td>
        <td> <input type="text"  name="name" class="form-control"> </td>
    </tr>
    <tr>
        <td>Mobile</td>
        <td><input type="number" name="mobile" class="form-control"></td>
    </tr>
    <tr>
        <td></td>
        <td><button type="submit" name="submit" class="btn btn-success">SAVE</button></td>
    </tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{

    $name=$_POST["name"];
    $mob=$_POST["mobile"];

$servername="localhost";
$dbusername="root";
$dbpassword="project";
$dbname="studentdb";
$connection = new mysqli($servername,$dbusername,$dbpassword,$dbname);
$sql="INSERT INTO `friends`(`name`, `mobile`) VALUES ('$name','$mob')";
$result= $connection->query($sql);
if($result===TRUE)
{
  echo "SUCCESS";

}
else{
    echo "Error",$connection->error;
}
}
?>
