<?php
    include("Header2.php");
    $temp =  $_SESSION['uname'];
    $query4 = "SELECT username FROM user WHERE username = '$temp'";
    if($result = $con->query($query4)){
        while($row = $result->fetch_array()){
        $id = $row['username'];
        } 
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="PageGuru.css" />

</head>
<body>

</body>
</html>