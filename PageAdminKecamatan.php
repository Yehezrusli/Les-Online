<?php
    include("Header2.php");
    $query = "SELECT * FROM Kecamatan"
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
                $idKec = $_POST['rahasia'];
                $namaKec = $_POST['outNamaKec'];
                $query2 = "UPDATE Kecamatan SET nama = '$namaKec' WHERE idKecamatan = $idKec";
                $con->query($query2);
            }

            if(isset($_POST['delete'])){
                $idKec = $_POST['rahasia'];
                $query4 = "DELETE FROM Kecamatan WHERE idKecamatan = $idKec";
                $con->query($query4);
            }
            
            if(isset($_POST['insertButton'])){
                $insertName = $_POST['insertNamaKec'];
                $query3 = "INSERT INTO kecamatan(nama) VALUES ('$insertName')";
                $con->query($query3);
            }
            $result = $con->query($query);
                echo "<h1>List Kecamatan</h1>";
                echo '<label>Nama Kecamatan: </label><input id="insertNamaKec" type="text" name="insertNamaKec">';
                echo '<input type="submit" value="Insert Kecamatan" id="insertButton" name="insertButton">';
                echo "<table>";
                echo "<tr>";
                echo "<th>idKecamatan</th>";
                echo "<th>Nama Kecamatan</th>";
                echo "<th>Ganti Nama Kecamatan</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["idKecamatan"].'</td>';
                    echo "<td>".$row['nama']."</td>";
                    $currNamaKecamatan = $row['nama'];
                    echo "<td><input type='text' name='outNamaKec' value=".$row['nama'].">";
                    echo '<td><input type="submit" name="edit" value="EDIT">';
                    echo '<td><input type="submit" name="delete" value="DELETE">';
                    echo '<input id="rahasia" type="text" value='.$row["idKecamatan"].' name="rahasia">';
                    echo '<input id="rahasia" type="text" value='.$row["nama"].' name="rahasia2">';
                    echo "</form>";
                }
                echo "</form>";
            ?>
</body>
</html>