
<?php
session_start();
include './dbcon.php';


$r = array();
$TimeArray = array();
$SpeedArray = array();
// $email = $_POST["email"];
// $password = $_POST["password"];

$UserId = $_SESSION["id"];

 $sql = "SELECT `Id`, `Speed`, `Datetime`, `UserId`, `lat`, `longitude` FROM `speed` WHERE UserId=$UserId order by `Id` desc limit 1
";
$result = $connection->query($sql);
if ($result->num_rows > 0) {


    while ($row = $result->fetch_assoc()) {

        // $r["data"][] = $row;

        $lat = $row['lat'];
        $long = $row['longitude'];
        $r["lat"] = $lat;
        $r["longitude"] = $long;
    }
} else {
    $r["status"] = "error";
}

echo json_encode($r);

?>