<?php
    include("Header3.php");
    include("connection.php");
    session_start();
    $temp =  $_SESSION['uname'];
    $query2 = "SELECT idGuru FROM guru WHERE username = '$temp'";
    if($result = $con->query($query2)){
        while($row = $result->fetch_array()){
        $id = $row['idGuru'];
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
    <div class="tabwaktu">
        <form method="post" action="">
            <?php
            if(isset($_POST['selesai'])){
                $idjadwal = $_POST['rahasia2'];
                $idLes = $_POST['rahasia'];
                $query3 = "UPDATE jadwal SET available = 1 WHERE idJadwal = $idjadwal";
                $con->query($query3);
                $query3 = "UPDATE les SET statusLes = 0 WHERE idLes = $idLes";
                $con->query($query3);
            }
             $query = "SELECT user.nama as nama, jadwal.hari as hari, jadwal.jam as jam, pelajaran.mataPelajaran as matPel, les.idLes as idLes, jadwal.idJadwal as idJadwal FROM user JOIN murid on user.userName = murid.userName JOIN les on murid.idMurid = les.idMurid JOIN jadwal on jadwal.idJadwal = les.idJadwal JOIN pelajaran on pelajaran.idPelajaran = jadwal.idPelajaran WHERE les.statusLes = 1 and jadwal.idGuru = $id";
             $result = $con->query($query);
             if($result->num_rows == 0){
                 echo "<h1>BELUM MEMILIKI JADWAL</h1>";
             }else{
                echo "<h1>Jadwal</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Nama Murid</th>";
                echo "<th>Hari</th>";
                echo "<th>Jam</th>";
                echo "<th>Mata Pelajaran</th>";
                echo "<th></th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row['nama'].'</td>';
                    echo '<td>'.$row["hari"].'</td>';
                    echo "<td>".$row['jam']."</td>";
                    echo "<td>".$row['matPel']."</td>";
                    echo '<td><input type="submit" name="selesai" value="SELESAI">';
                    echo '<input id="rahasia" type="text" value='.$row["idLes"].' name="rahasia">';
                    echo '<input id="rahasia" type="text" value='.$row["idJadwal"].' name="rahasia2">';

                    echo "</form>";
                }
                echo "</form>";
            }
                ?>
             </form>
        </div>
        <?php
            
        ?>  
</body>
</html>
