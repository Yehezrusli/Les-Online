<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<<<<<<< HEAD
    <link rel="stylesheet" type="text/css" media="screen" href="HeaderGuru.css" />
=======
    <link rel="stylesheet" type="text/css" media="screen" href="Header.css" />
>>>>>>> af6d3bdd025b3dc67ec18d8a63cbc7c8704ed8d8

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
                <a href="PageAdminKelurahan.php">Kelurahan</a>
            </li>
            <li>
                <a href="PageAdminKecamatan.php">Kecamatan</a>
            </li>
            <li>
                <a href="PageAdminRanks.php">Rank List</a>
            </li>
            <li>
                <a href="PageAdminUserlist.php">User List</a>
            </li>
        </ul>
    </div>

    <div id="info">
        <h1>WELCOME ADMIN</h1>
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