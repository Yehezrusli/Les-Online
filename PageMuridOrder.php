<?php
    include("Header.php");
    include("connection.php");
    $query = "SELECT user.nama as nama, jadwal.hari as hari, jadwal.jam as jam, pelajaran.mataPelajaran as pel, jadwal.idJadwal as id FROM user JOIN guru on user.userName = guru.userName JOIN jadwal on jadwal.idGuru = guru.idGuru JOIN pelajaran on jadwal.idPelajaran = pelajaran.idPelajaran ORDER BY pel";
    $result = $con->query($query);
    
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
    <div id="bingkai">
        <form action="">
        <fieldset>
        <?php
        if($result->num_rows == 0){
            echo "<h1>BELUM MEMILIKI JADWAL</h1>";
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
            while($row = $result->fetch_array()){
                echo "<tr>";
                echo '<form method='."post".'>';
                echo '<td>'.$row["nama"].'</td>';
                echo "<td>".$row['hari']."</td>";
                echo "<td>".$row['jam']."</td>";
                echo "<td>".$row['pel']."</td>";
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