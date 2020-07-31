<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-image: url('a1.jpg');">
<form method="POST">
<table class="table">
    <tr>
        <td> Username </td>
        <td> <input type="text"  name="username" class="form-control"> </td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" class="form-control"></td>
    </tr>
    <tr>
        <td></td>
        <td><button type="submit" name="submit" class="btn btn-success">LOGIN</button></td>
    </tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST["submit"]))
{

    $name=$_POST["username"];
    $pass=$_POST["password"];

$servername="localhost";
$dbusername="root";
$dbpassword="project";
$dbname="studentdb";
$connection = new mysqli($servername,$dbusername,$dbpassword,$dbname);
$sql="SELECT `id`,`name`, `address`, `mobile`, `email`, `place`, `username`, `password` FROM `addfisherman` WHERE `username`='$name' AND`password`='$pass'";
$result= $connection->query($sql);
if($result->num_rows>0)
{
    while($row=$result->fetch_assoc())
    {
        header('Location:addfisherman.php');
    }

}
else{
    echo "Error",$connection->error;
}
}
?>
