<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-image: url('a7.jpeg');">

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="addfisherman.php">Add Fisherman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="fishermansearch.php">Search Fisherman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification.php">Send Notification</a>
          </li>


          <li class="nav-item">
            <a class="nav-link" href="index2.php">LOG OUT</a>
          </li>

        </ul>
      </nav>

<form method="POST">
    <table class="table">
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td> Name</td>
            <td> <input type="text"  name="name" class="form-control"></td></tr>
        <tr>
            <td>Address</td>
            <td><textarea cols="30"  name="address" rows="5"></textarea></td>
        </tr>
        <tr>
            <td>Mobile</td>
            <td> <input type="number"  name="mobile" class="form-control"></td>
        </tr>
        <tr>
            <td>E-mail</td>
            <td> <input type="text"  name="e-mail" class="form-control"></td>
        </tr>
        <tr>
            <td>Place</td>
            <td> <input type="text"  name="place" class="form-control"></td>
        </tr>
        <tr>
            <td>Username</td>
            <td> <input type="text"  name="username" class="form-control"></td>
        </tr>
        <tr>
            <td>Password</td>
            <td> <input type="Password" name="password" class="form-control"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="btn btn-success" type="submit" name="submit">Register</button></td>
        </tr>
    </table>

</form>
<!--<table class="table">
    <input type="text" class="form-control">
    name=abel&address=puthuvana&mobile=123&e-mail=abel&place=uae&username=abel123&password=abel123
</table>-->
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
    $addr=$_POST["address"];
    $mob=$_POST["mobile"];
    $email=$_POST["e-mail"];
    $place=$_POST["place"];
    $username=$_POST["username"];
    $password=$_POST["password"];

$servername="localhost";
$dbusername="root";
$dbpassword="project";
$dbname="studentdb";
$connection = new mysqli($servername,$dbusername,$dbpassword,$dbname);
$sql="INSERT INTO `addfisherman`( `name`, `address`, `mobile`, `email`, `place`, `username`, `password`) VALUES ('$name','$addr','$mob','$email','$place','$username','$password')";
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
