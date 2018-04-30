<?php
    include("Header2.php");
    $query = "SELECT Les.idMurid, User.username, User.nama, COUNT(idLes) as 'JumlahLes' FROM Les JOIN Murid ON Les.idMurid = Murid.idMurid JOIN User ON User.username = Murid.username GROUP BY Les.idMurid ORDER BY 'JumlahLes' DESC LIMIT 0,10";
    $query2 = "SELECT idGuru, user.username, user.nama, COUNT(idLes) as 'JumlahLes' FROM Les JOIN Jadwal ON Les.idJadwal = jadwal.idJadwal JOIN user ON user.username = Guru.username GROUP BY Les.idGuru ORDER BY 'JumlahLes' DESC LIMIT 0,10";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="PageMurid.css" />

</head>
<body>
    <div id="bingkai">
            <?php
            $result = $con->query($query);
                echo "<h1>Rank Murid</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>ID User</th>";
                echo "<th>Username</th>";
                echo "<th>Nama Murid</th>";
                echo "<th>Jumlah Les</th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["idMurid"].'</td>';
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['JumlahLes']."</td>";
                }
                echo "</table>";

            $result = $con->query($query2);
                echo "<h1>Rank Guru</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>ID User</th>";
                echo "<th>Username</th>";
                echo "<th>Nama Guru</th>";
                echo "<th>Jumlah Les</th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["idGuru"].'</td>';
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['JumlahLes']."</td>";
                }
                echo "</table>";
                //comment to recommit
            ?>
</body>
</html>