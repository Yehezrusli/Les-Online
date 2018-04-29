<?php
    include("Header.php");
    include("connection.php");

    session_start();
    $temp =  $_SESSION['uname'];
    $query2 = "SELECT user.nama as nama, user.userName as username, user.alamat as alamat, kecamatan.nama as kecamatan, kelurahan.nama as kelurahan, murid.namaSekolah as sekolah, murid.kelas as kelas FROM murid JOIN user ON murid.userName=user.userName JOIN kelurahan on kelurahan.idKelurahan = user.idKelurahan JOIN kecamatan ON kecamatan.idKecamatan = user.idKecamatan WHERE user.username = '$temp'";
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profil Murid</title>
</head>
<body>
    <div id="profil">
    <?php
        if($result = $con->query($query2)){
            while($row = $result->fetch_array()){
                echo "<p>Nama: ".$row['nama'].'</p>';
            }
        }
    ?>
    </div>

</body>
</html>