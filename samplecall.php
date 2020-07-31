<?php
include './dbcon.php';
if (isset($_POST["userid"])) {

    $r = array();

    $userid = $_POST['userid'];
    $speed = $_POST['speed'];
    $lat = $_POST['lat'];
    $longitude = $_POST['longi'];

    //


    // 	file_get_contents("http://logixspace.com/smspack/messaging.php?userid=2272576462&password=VGCXOVBVU7&msg=Your%20OTP%20for%20the%20amount%20$amount%20is%20$otp.%20Thank%20you%20&phone=$PhoneNumber");



    $sql = "SELECT `Id`, `Lat`, `Longitude` FROM `Border` ";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $getLat = $row["Lat"];
            $getLongitude = $row["Longitude"];


            $latitudeFrom =$getLat;
$longitudeFrom = $getLongitude;

$latitudeTo = $lat;
$longitudeTo =  $longitude;

//Calculate distance from latitude and longitude
$theta = $longitudeFrom - $longitudeTo;
$dist = sin(deg2rad($latitudeFrom)) * sin(deg2rad($latitudeTo)) +  cos(deg2rad($latitudeFrom)) * cos(deg2rad($latitudeTo)) * cos(deg2rad($theta));
$dist = acos($dist);
$dist = rad2deg($dist);
$miles = $dist * 60 * 1.1515;

 $distance = ($miles * 1.609344);

 if( $distance ==0)
 {
   $sql = "SELECT  `mobile`FROM `addfisherman` WHERE `id`=$userid ";
   $result = $connection->query($sql);

   if ($result->num_rows > 0) {

       while ($row = $result->fetch_assoc()) {
           $mobile = $row["mobile"];
          $status= file_get_contents("http://logixspace.com/smspack/messaging.php?userid=8049438939&password=UHM0MNV5J3&msg=You%20CROSSED%20the%20BORDER.%20Stay%20away%20from%20there%20soon&phone=$mobile");

          $status = $connection -> real_escape_string($status);

$insSql="INSERT INTO `smslogs`
(`userId`,
`PhoneNumber`, `Message`, `DateTime`,`Distance`,
`status`)
VALUES($userid,$mobile,'Border Cross message',now(),
$distance,'$status') ";
$connection->query($insSql);

$r["message"] = "sms has sent succesfully";
       }
   }
 }

 if( $distance < 5)
 {

    $sql = "SELECT  `mobile`FROM `addfisherman` WHERE `id`=$userid ";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $mobile = $row["mobile"];
           $status= file_get_contents("http://logixspace.com/smspack/messaging.php?userid=8049438939&password=UHM0MNV5J3&msg=You%20are%20near%20to%20BORDER.%20Stay%20away%20from%20there%20soon&phone=$mobile");

           $status = $connection -> real_escape_string($status);

 $insSql="INSERT INTO `smslogs`
(`userId`,
`PhoneNumber`, `Message`, `DateTime`,`Distance`,
`status`)
 VALUES($userid,$mobile,'Border Cross message',now(),
 $distance,'$status') ";
$connection->query($insSql);

$r["message"] = "sms has sent succesfully";
        }
    }


 }


        }
    } else {
        echo "<script>  alert('Invalid Credentials')</script>";
    }





    $sql = "INSERT INTO `speed`( `Speed`, `Datetime`, `UserId`,`lat`, `longitude`,Distance)  VALUES
     ($speed,now(),$userid,'$lat','$longitude',$distance)";
    $result = $connection->query($sql);
    if ($result === TRUE) {
        $r["status"] = "success";
    } else {
        $r["status"] = "error";
    }

    echo json_encode($r);
} else {
    $r = array();
    $r["status"] = "inavlid call";
    echo json_encode($r);
}
