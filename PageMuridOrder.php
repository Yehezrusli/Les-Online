<?php
    include("Header.php");
    include("connection.php");
    $query = "SELECT user.nama as nama, jadwal.hari as hari, jadwal.jam as jam, pelajaran.mataPelajaran as matPel, jadwal.idJadwal as id, pelajaran.idPelajaran as idP FROM user JOIN guru on user.userName = guru.userName JOIN jadwal on jadwal.idGuru = guru.idGuru JOIN pelajaran on jadwal.idPelajaran = pelajaran.idPelajaran WHERE jadwal.available = 1 AND user.stat = 1";
    session_start();
    $temp =  $_SESSION['uname'];
    $query3 = "SELECT idMurid FROM murid WHERE username = '$temp'";
    if($result = $con->query($query3)){
        while($row = $result->fetch_array()){
        $id = $row['idMurid'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="PageMurid.css" />
    <title>Order Les</title>
</head>
<body>
    <div id="info">
            <p>Murid</p>
            <br>
            <div id="bungkus">
                <?php
                    $query2 = "SELECT user.nama as nama, murid.idMurid as idMurid, murid.kelas as kelas, murid.namaSekolah as sekolah FROM user JOIN murid on user.userName = murid.userName WHERE user.userName = '$temp'";
                    if($result = $con->query($query2)){
                        while($row = $result->fetch_array()){
                        echo '<p id="data">Nama: '.$row['nama'].'</p>';
                        echo '<p id="data">ID Murid: '.$row['idMurid'].'</p>';
                        echo '<p id="data">Sekolah: '.$row['sekolah'].'</p>';
                        echo '<p id="data">Kelas: '.$row['kelas'].'</p>';
                        }
                    }
                ?>
            </div>
    </div>
    <div id="bingkai">
        <form action="" method="post">
            <br>
            <label>Mata Pelajaran:</label>
            <select name="pelajaran">
            <?php
                    $query2 = "SELECT * FROM pelajaran";
                        if($result = $con->query($query2)){
                            while($row = $result->fetch_array()){
                                echo '<option value='.$row['idPelajaran'].'>'.$row['mataPelajaran'].'</option>';
                            }
                        }
                    ?>
            </select>
            <input type="submit" name="search" value="SEARCH">
            <?php
                if(isset($_POST['search'])){
                    $pel = $_POST['pelajaran'];
                    $query .= "  AND pelajaran.idPelajaran = $pel";
                }
            ?>

            <fieldset>
            <?php
            if(isset($_POST['order'])){
                $idJadwal = $_POST['rahasia'];
                $query4 = "INSERT INTO les(idJadwal, idMurid, tanggalOrder, tanggalLes, statusLes) VALUES($idJadwal, $id, CURDATE(), null, 1)";
                $con->query($query4);
                $query5 = "UPDATE jadwal SET available = 0 WHERE idJadwal = $idJadwal";
                $con->query($query5);
//                UPDATE users SET username = '$username' WHERE userID = $id
            }
            $result2 = $con->query($query);
            if($result2->num_rows == 0){
                echo "<h1>BELUM ADA JADWAL LES</h1>";
            }else{
                echo "<h1>Jadwal</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Guru</th>";
                echo "<th>Hari</th>";
                echo "<th>Jam</th>";
                echo "<th>Mata Pelajaran</th>";
                echo "<th></th>";
                echo "</tr>";
                while($row = $result2->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["nama"].'</td>';
                    echo "<td>".$row['hari']."</td>";
                    echo "<td>".$row['jam']."</td>";
                    echo "<td>".$row['matPel']."</td>";
                    echo '<td><input type="submit" name="order" value="ORDER">';
                    echo '<input id="rahasia" type="text" value='.$row["id"].' name="rahasia">';
                    echo "</form>";
                }
                echo "</form>";
            }
            ?>
            </fieldset>
    </form>
    </div>
</body>
</html>