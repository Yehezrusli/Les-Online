<?php
    include("Header2.php");
    include("connection.php");
    $query = "SELECT Les.idMurid as id, User.username as uname, User.nama as nama, COUNT(idLes)as JumlahLes FROM Les JOIN Murid ON Les.idMurid = Murid.idMurid JOIN User ON User.username = Murid.username GROUP BY Les.idMurid ORDER BY JumlahLes DESC LIMIT 0,10";
    $query2 = "SELECT guru.idGuru as id, user.username as uname, user.nama as nama, COUNT(idLes) as JumlahLes FROM user JOIN guru on user.userName = guru.userName JOIN jadwal ON guru.idGuru = jadwal.idGuru JOIN les ON jadwal.idJadwal = les.idJadwal ORDER BY JumlahLes DESC LIMIT 0,10";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="PageAdmin.css" />

</head>
<body>
    <div id="bingkai">
        <form action="" method="post">
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
                    echo '<td>'.$row["id"].'</td>';
                    echo "<td>".$row['uname']."</td>";
                    echo "<td>".$row['nama']."</td>";
                    echo "<td>".$row['JumlahLes']."</td>";
                }
                echo "</table>";

            
                echo "<h1>Rank Guru</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>ID User</th>";
                echo "<th>Username</th>";
                echo "<th>Nama Guru</th>";
                echo "<th>Jumlah Les</th>";
                echo "</tr>";
                if($result = $con->query($query2)){
                    while($row = $result->fetch_array()){
                        echo "<tr>";
                        echo '<form method='."post".'>';
                        echo '<td>'.$row["id"].'</td>';
                        echo "<td>".$row['uname']."</td>";
                        echo "<td>".$row['nama']."</td>";
                        echo "<td>".$row['JumlahLes']."</td>";
                    }
                }
                echo "</table>";
                //comment to recommit
            ?>
        </form>
</body>
</html>