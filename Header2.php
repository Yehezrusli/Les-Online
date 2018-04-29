<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="Header.css" />

</head>

<body background="background3.jpg">
    <div id="TabAtas">
        <img src="Bimbel kece.jpg" alt="animasi les">
        <div class="tulisan">
            <p id="Header">Les Private Simulator</p>  
            <p id="judul">Cara Mudah Lihat Pesan Dan Belajar </p>
        </div>
        <a style="color:white; font-size: 20px; margin: 30px;" id="logout" href="Login.php">Log Out</a>
    </div>
    <div>
        <ul>
            <li>
                <a href="">Home</a>
            </li>
            <li>
                <a href="PageAdminKelurahan.php">Kelurahan</a>
            </li>
            <li>
                <a href="PageAdminKecamatan.php">Kecamatan</a>
            </li>
            <li>
                <a href="">Rank List</a>
            </li>
            <li>
                <a href="">User List</a>
            </li>
            <li>
                <a href="">Statistics</a>
            </li>
        </ul>
    </div>

    <div id="info">
        <p id="data">WELCOME ADMIN</p>
    </div>
        <?php
            include("connection.php");
            session_start();
        ?>

</body>

</html>