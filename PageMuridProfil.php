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
    <link rel="stylesheet" type="text/css" media="screen" href="PageMurid.css" />
    <title>Profil Murid</title>
</head>
<body>
    <div id="bingkai">
        <form action="" method="post">
            <?php   
                if($result = $con->query($query2)){
                    while($row = $result->fetch_array()){
                        echo '<p id="identitas">Nama        : '.$row['nama'].'</p>';
                        echo '<p id="identitas">UserName    : '.$row['username'].'</p>';
                        echo '<p id="identitas">Alamat      : '.$row['alamat'].'</p>';
                        echo '<p id="identitas">Kecamatan   : '.$row['kecamatan'].'</p>';
                        echo '<p id="identitas">Kelurahan   : '.$row['kelurahan'].'</p>';
                        echo '<p id="identitas">Sekolah     : '.$row['sekolah'].'</p>';
                        echo '<p id="identitas">Kelas       : '.$row['kelas'].'</p>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<input style="margin-left: 50px" type="submit" name="edit" value="EDIT">';

                    }
                }
                if(isset($_POST['edit'])){
                    header("Location:PageMuridEditProfil.php");
                }
    ?>
    </form>
    </div>

</body>
</html>