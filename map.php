<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&libraries=places"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function fetchdata() {
            $.ajax({
                type: "GET",
                url: "fetch_location.php",
                success: function(data) {
                    var objJSON = JSON.parse(data);
                    var lat = objJSON.lat;
                    var long = objJSON.longitude;
                    // alert(objJSON.longitude);
                    // console.log(objJSON.longitude);
                    var latlng = new google.maps.LatLng(lat, long);
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: latlng,
                        zoom: 15
                    });
                    var marker = new google.maps.Marker({
                        map: map,
                        position: latlng,
                        draggable: false,
                        anchorPoint: new google.maps.Point(0, -29)
                    });
                    var infowindow = new google.maps.InfoWindow();
                },
                error: function(data) {
                    console.log(data);
                    alert(data);
                },
            });
        }
        function initialize() {
            var latlng = new google.maps.LatLng(9.2095078, 76.681583);
            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 13
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: false,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var infowindow = new google.maps.InfoWindow();
        }
        fetchdata();
        // google.maps.event.addDomListener(window, 'load', fetchdata);
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-primary">
        <a class="navbar-brand" href="#">  Project</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            
            <li class="nav-item">
            <a class="nav-link" href="fishermansearch.php">Search Fisherman</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="notification.php">Send Notification</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">LOG OUT</a>
          </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col col-12 col-sm-12">
                <br>
                <br>
                <div id="map" style="width: 100%; height: 720px;"></div>
            </div>
        </div>
    </div>
</body>
</html>