<?php
    include("Header.php");
    include("connection.php");

    session_start();
    $temp =  $_SESSION['uname'];
    $query2 = "SELECT user.nama as nama, user.userName as username, user.alamat as alamat, kecamatan.nama as kecamatan, kelurahan.nama as kelurahan, guru.pendidikanTerakhir as pendidikan FROM guru JOIN user ON guru.userName=user.userName JOIN kelurahan on kelurahan.idKelurahan = user.idKelurahan JOIN kecamatan ON kecamatan.idKecamatan = user.idKecamatan WHERE user.username = '$temp'";
    $query3 = "SELECT * FROM kecamatan";
    $query4 = "SELECT * FROM kelurahan";
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
                        echo '<label id="bio">Nama:</label>';
                        echo '<input name="nama" type="text" value='.$row['nama'].'>';
                        echo '<label id="bio">Alamat:</label>';
                        echo '<input name="alamat" type="text" value='.$row['alamat'].'>';
                        echo '<label id="bio">Pendidikan Terakhir:</label>';
                        echo '<select name="pendidikan">';
                        echo '<option value="SD">SD</option>';
                        echo '<option value="SMP">SMP</option>';
                        echo '<option value="SMA">SMA</option>';
                        echo '<option value="S1">S1</option>';
                        echo '<option value="S2">S2</option>';
                        echo '<option value="S3">S3</option>';
                        echo '</select>';
                        echo '<label id="bio">Kelurahan:</label>';
                        echo '<select name="kelurahan">';
                        if($result2 = $con->query($query4)){
                            while($row = $result2->fetch_array()){
                                echo '<option value='.$row["idKelurahan"].'>'.$row['nama'].'</option>';
                            }
                        }
                        echo '</select>';
                        echo '<label id="bio">Kecamatan:</label>';
                        echo '<select name="kecamatan">';
                        if($result2 = $con->query($query3)){
                            while($row = $result2->fetch_array()){
                                echo '<option value='.$row["idKecamatan"].'>'.$row['nama'].'</option>';
                            }
                        }
                        echo '</select>';
                        echo '<br>';
                        echo '<br>';
                        echo '<br>';
                        echo '<input style="margin-left: 50px" type="submit" name="submit" value="SUBMIT">';

                    }
                }

                if(isset($_POST['submit'])){
                    $nama = $_POST['nama'];
                    //echo $nama;
                    $alamat = $_POST['alamat'];
                    //echo $alamat;
                    $pendidikan = $_POST['pendidikan'];
                    //echo $pendidikan;
                    $kelurahan = $_POST['kelurahan'];
                    //echo $kelurahan;
                    $kecamatan = $_POST['kecamatan'];                    
                    //echo $kecamatan;

                    echo $temp;
                    $query = "UPDATE user SET nama = '$nama' WHERE userName = '$temp'";
                    $con->query($query);
                    $query="UPDATE user SET alamat = '$alamat' WHERE userName = '$temp'";
                    $con->query($query);
                    $query="UPDATE guru SET pendidikanTerakhir = '$pendidikan' WHERE userName = '$temp'";
                    $con->query($query);
                    $query="UPDATE user SET idKelurahan= $kelurahan WHERE userName = '$temp'";
                    $con->query($query);
                    $query="UPDATE user SET idKecamatan = $kecamatan WHERE userName = '$temp'";
                    $con->query($query);
                    header("Location:PageGuruProfil.php");

                }
        ?>
    </form>
    </div>

</body>
</html>