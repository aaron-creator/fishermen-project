<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="background-image: url('a6.jpeg');">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <ul class="navbar-nav">
       
      
          <li class="nav-item">
            <a class="nav-link" href="fishermansearch.php">Search Fisherman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification.php">Send Notification</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="borderlist.php">Border Crossing </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">LOG OUT</a>
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
            <td>Name</td>
            <td> <input type="text" name="name" class="form-control"></td>
        </tr> 
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="btn btn-success" name="submit" type="submit">Search</button></td>
        </tr>
    </table>
</form>
</body>
</html>
<?php
session_start();
include './dbcon.php';

if(isset($_POST["submit"]))
{
    $name=$_POST["name"];
     $sql = "SELECT `id`, `name`, `address`, `mobile`, `email`, `place`, `username`, `password` FROM `addfisherman` WHERE `username`='$name' ";
    $result = $connection->query($sql);
    
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {

         $_SESSION["id"]= $row["id"];

       header('Location:map.php');
      }
    } else {
      echo "0 results";
    }
}
?>