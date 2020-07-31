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
            <td>Message</td>
            <td><textarea  cols="28" rows="10" name="message"></textarea>  </td>
        </tr>
        <tr>
          <td></td>
          <td></td>
        </tr>
        <tr>
            <td></td>
            <td><button class="btn btn-success" name="submit" type="submit"> send</button></td>
        </tr>
    </table>
  </form>  
</body>
</html>
<?php
if(isset($_POST["submit"]))
{
    $msg=$_POST["message"];
    $server_name="localhost";
    $db_username="root";
    $db_password="project";
    $db_name="studentdb";
    $connection=new mysqli($server_name,$db_username,$db_password,$db_name);
    $sql="SELECT `id`, `name`, `address`, `mobile`, `email`, `place`, `username`, `password` FROM `addfisherman` WHERE 1
    ";
        $res=$connection->query($sql);
    
    if($res->num_rows>0){
    
        while($row=$res->fetch_assoc()){
    
            $name=$row["name"];
            $mobile=$row["mobile"];

            $message="Dear ".$name.",".$msg;
            $messageToSend=str_replace(" ","%20",$message);

       file_get_contents("http://logixspace.com/smspack/messaging.php?userid=8049438939&password=UHM0MNV5J3&msg=$messageToSend&phone=$mobile");

echo "<script>alert('Message has sent succesfully to $name ') </script>";

        }
      
      }



}
?>