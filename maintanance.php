<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Maintenance</title>

        <style>
            body {
                margin:0 auto;
                text-align: center;
                color:#737373;
            }
        </style>
    </head>

    <body style="font-family:constantia;">

        <img src= "http://www.youthwayap.org/asset/images/logo_3.png">

        <h1><p>Sorry for the inconvenience while we are upgrading. </p>
            <p>Please revisit shortly</p>
        </h1>
        <div></div>

        <img src="http://www.youthwayap.org/asset/images/maintanance.jpg"   >

    </body>
</html>
<?php
header('HTTP/1.1 503 Service Temporarily Unavailable');
header('Status: 503 Service Temporarily Unavailable');
header('Retry-After: 3600');
?>