
<?php
include './dbcon.php';


$r = array();
$TimeArray = array();
$SpeedArray = array();
$email = $_POST["email"];
$password = $_POST["password"];



$sql = "SELECT TIMESTAMPDIFF(SECOND,`Datetime`,now()) as time,`UserId`,`Speed`,`Datetime` FROM `speed`  ORDER BY `Id` DESC LIMIT 2
";
$result = $connection->query($sql);
if ($result->num_rows > 0) {


    $x = 0;
    $Counter = 0;
    while ($row = $result->fetch_assoc()) {

        // $r["data"][] = $row;

        $TimeArray[$Counter] = $row['time'];
        $SpeedArray[$Counter] = $row['Speed'];
        $Counter++;
    }
    $time = $TimeArray[1] - $TimeArray[0];
    $speed = $SpeedArray[1] - $SpeedArray[0];

    if ($time < 5) {

        if ($speed > 50) {
            $r["status"] = "Accident Detected";
            $r["timediff"] = $time;
            $r["speeddiff"] = $speed;

            // SMS API ;
            
        } else {
            $r["status"] = "NO Accident Detected";
            $r["timediff"] = $time;
            $r["speeddiff"] = $speed;
            // echo "NO Accident Detected";
        }
    }
} else {
    $r["status"] = "error";
}

echo json_encode($r);

?>