<?php
    include("Header.php");
    include("connection.php");
    session_start();
    $temp =  $_SESSION['uname'];
    $query4 = "SELECT idMurid FROM murid WHERE username = '$temp'";
    if($result = $con->query($query4)){
        while($row = $result->fetch_array()){
        $id = $row['idMurid'];
        }
    }
    $query = "SELECT user.nama as nama, jadwal.hari as hari, jadwal.jam as jam, pelajaran.mataPelajaran as pel, les.idMurid as idM, les.idLes as idLes, les.idJadwal as idJadwal FROM user JOIN guru on user.userName = guru.userName JOIN jadwal ON guru.idGuru = jadwal.idGuru JOIN pelajaran on pelajaran.idPelajaran = jadwal.idPelajaran JOIN les on jadwal.idJadwal = les.idJadwal WHERE jadwal.available = 0 and les.statusLes = 1 and les.idMurid = $id";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" media="screen" href="PageMurid.css" />
    <title>Home</title>
</head>
<body>
<div id="bingkai">
        <form action="" method="post">
            <?php
            if(isset($_POST['delete'])){
                $idJadwal = $_POST['rahasia2'];
                $idLes = $_POST['rahasia'];
                $query2 = "UPDATE jadwal SET available = 1 WHERE idJadwal = $idJadwal";
                $con->query($query2);
                $query2 = "DELETE FROM les WHERE idLes = $idLes";
                $con->query($query2);
            }
            $result = $con->query($query);
            if($result->num_rows == 0){
                echo "<h1>BELUM ADA JADWAL LES</h1>";
            }else{
                echo "<h1>Jadwal Les</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Guru</th>";
                echo "<th>Hari</th>";
                echo "<th>Jam</th>";
                echo "<th>Mata Pelajaran</th>";
                echo "<th></th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["nama"].'</td>';
                    echo "<td>".$row['hari']."</td>";
                    echo "<td>".$row['jam']."</td>";
                    echo "<td>".$row['pel']."</td>";
                    echo '<td><input type="submit" name="delete" value="CANCEL">';
                    echo '<input id="rahasia" type="text" value='.$row["idLes"].' name="rahasia">';
                    echo '<input id="rahasia" type="text" value='.$row["idJadwal"].' name="rahasia2">';
                    echo "</form>";
                }
                echo "</form>";
            }
            ?>
            </fieldset>
    </form>
    </div>
    <?php

        
    ?>
</body>
</html>