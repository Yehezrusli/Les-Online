<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="PageMurid.css" />

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
                <a href="">Kelurahan</a>
            </li>
            <li>
                <a href="">Kecamatan</a>
            </li>
            <li>
                <a href="">Rank List</a>
            </li>
        </ul>
    </div>

    <div id="info">
        <?php
            include("connection.php");
            session_start();
            $temp =  $_SESSION['uname'];
            $query2 = "SELECT user.nama as nama, murid.idMurid as idMurid, murid.kelas as kelas, murid.namaSekolah as sekolah FROM user JOIN murid on user.userName = murid.userName WHERE username = '$temp'";
            if($result = $con->query($query2)){
                while($row = $result->fetch_array()){
                echo '<p id="data">.Nama :'.$row['nama'].'</p>';
                echo '<p id="data">ID Murid :'.$row['idMurid'].'</p>';
                echo '<p id="data">Sekolah :'.$row['sekolah'].'</p>';
                echo '<p id="data">Kelas :'.$row['kelas'].'</p>';
                }
            }
        ?>
    </div>


</body>

</html>