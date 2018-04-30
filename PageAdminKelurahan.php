<?php
    include("Header2.php");
    include("connection.php");
    $query = "SELECT * FROM kelurahan"
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
            if(isset($_POST['edit'])){
                $idKel = $_POST['rahasia'];
                $namaKel = $_POST['outNamaKel'];
                $query2 = "UPDATE kelurahan SET nama = '$namaKel' WHERE idKelurahan = $idKel";
                $con->query($query2);
            }

            if(isset($_POST['delete'])){
                $idKel = $_POST['rahasia'];
                $query4 = "DELETE FROM Kelurahan WHERE idKelurahan = $idKel";
                $con->query($query4);
            }
            
            if(isset($_POST['insertButton'])){
                $insertName = $_POST['insertNamakel'];
                $query3 = "INSERT INTO kelurahan(nama) VALUES ('$insertName')";
                $con->query($query3);
            }
            $result = $con->query($query);
                echo "<h1>List Kelurahan</h1>";
                echo '<label>Nama kelurahan: </label><input id="insertNamakel" type="text" name="insertNamakel">';
                echo '<input type="submit" value="Insert" id="insertButton" name="insertButton">';
                echo "<table>";
                echo "<tr>";
                echo "<th>idKelurahan</th>";
                echo "<th>Nama Kelurahan</th>";
                echo "<th>Ganti Nama Kelurahan</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["idKelurahan"].'</td>';
                    echo "<td>".$row['nama']."</td>";
                    $currNamaKelurahan = $row['nama'];
                    echo "<td><input type='text' name='outNamaKel' value=".$row['nama']."></td>";
                    echo '<td><input type="submit" name="edit" value="EDIT"></td>';
                    echo '<td><input type="submit" name="delete" value="DELETE">';
                    echo '<input id="rahasia" type="text" value='.$row["idKelurahan"].' name="rahasia"></td>';
                    echo "</form>";
                }
                echo "</form>";
            ?>
</body>
</html>