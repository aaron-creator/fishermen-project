
<?php
include './dbcon.php';
if (isset($_POST["email"])) {

  $r = array();
  $email = $_POST["email"];
  $password = $_POST["password"];



  $sql = "SELECT `id`, `name`, `address`, `mobile`, `email`, `place`, `username`, `password` FROM `addfisherman` WHERE `username`='$email' and `password`='$password'
";
  $result = $connection->query($sql);
  if ($result->num_rows > 0) {

    $r["status"] = "success";
    while ($row = $result->fetch_assoc()) {

      // $r["data"][] = $row;

      $r["id"] = $row['id'];
    }
  } else {
    $r["status"] = "error";
  }

  echo json_encode($r);
} else {

  $r = array();
  $r["status"] = "inavlid call";
  echo json_encode($r);
}
?>