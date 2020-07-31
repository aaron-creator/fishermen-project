<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body style="background-image:url('college.jpg')" ;>
    <nav class="navbar navbar-expand-sm bg-primary navbar-dark">
        <ul class="navbar-nav">
            <li class="nav-item add">
                <h4><b>ADMIN LOGIN</b></h4>
            </li>
        </ul>
    </nav>
    <br><br><br> <br>
    <div class="container">
        <center>
            <h1> Fishermen  App </h1>
        </center>
        <center>
            <h4> Web App </h4>
        </center>
        <br>
        <div class="row">


            <div class="col col-12 col-sm-3">

            </div>
            <div class="col col-12 col-sm-6">
                <form action="" method="POST">
                    <table class="table table-borderless table-striped">
                        <td>Username</td>
                        <td><input type="text" class="form-control" name="username"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="password" class="form-control" name="password"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <center> <input type="submit" value="Login" class="btn btn-success" name="login"> </center>
                            </td>
                        </tr>




                    </table>
                </form>
            </div>

            <div class="col col-12 col-sm-3">
            </div>
</body>

</html>
<?php
include './dbcon.php';
session_start();
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

 

    if ($username =="admin"&&$password=="admin") {

        header('Location:fishermansearch.php');

    } else {
        echo "<script>  alert('Invalid Credentials')</script>";
    }
}
?>