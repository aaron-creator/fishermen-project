<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
<div class="container">
<div class="row">
<div class="col col-12 col-sm-2">


</div>

<div class="col col-12 col-sm-8">
<form action="" method="post"> 
<table class="table table-striped">
<tr class="table-warning">
    <th> Name</th>
    <th> Address    </th>

    <th>Contact Number</th>
    <th>  Distance </th>
    <th>  Date </th>

</tr>

<?php
$server_name="localhost";
$db_username="root";
$db_password="project";
$db_name="studentdb";
$connection=new mysqli($server_name,$db_username,$db_password,$db_name);
$sql="SELECT a.name,a.address, `PhoneNumber`, `Message`, `DateTime`, `Distance` FROM `smslogs` s join addfisherman a on a.id=s.`userId` order by s.`id` desc
";
    $res=$connection->query($sql);

if($res->num_rows>0){

    while($row=$res->fetch_assoc()){

        $name=$row["name"];
        $address=$row["address"];
        $contactno=$row["PhoneNumber"];

        $DateTime=$row["DateTime"];

        $Distance=$row["Distance"];


     
        

        echo "<tr>
        <td> $name </td>
        <td>  $address </td>
        <td>  $contactno </td>
        <td>  $Distance </td>
        <td>  $DateTime </td>

    </tr>";




    }

}
else{
    echo "<script> alert('No new fisherman border crossing details available')   </script>";

}

?>
</table>
</form>
</div>

<div class="col col-12 col-sm-2">


</div>
</div>
</div>

    
</body>
</html>
