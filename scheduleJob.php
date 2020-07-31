<!DOCTYPE html>
<html lang="en">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function fetchdata() {
            $.ajax({
                url: 'check.php',
                type: 'get',
                success: function(response) {
                    // Perform operation on the return value
                    alert(response);
                }
            });
        }
        $(document).ready(function() {
            setInterval(fetchdata, 5000);
        });
    </script>
</head>
<body>
    <!-- <div class="container">
<div class="row">
    <div class="col col-3 col-sm-">
    
    
    </div>
</div>
</div> -->
</body>
</html>