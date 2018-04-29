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
    <link rel="stylesheet" type="text/css" media="screen" href="PageMurid.css" />

</head>
<body>
    <div id="bingkai">

        <form action="" method="post">
            <?php
            $idKec = $_POST['rahasia'];
            if(isset($_POST['edit'])){
                $namaKec = $_POST['outNamaKec'];
                $query2 = "UPDATE Kecamatan SET namaKecamatan = '$namaKec' WHERE idKecamatan = $idKec";
                $con->query($query2);
            }

            if(isset($_POST['delete'])){
                $query4 = "DELETE FROM Kecamatan WHERE idKecamatan = $idKec";
                $con->query($query4);
            }
            
            if(isset($_POST['insertButton'])){
                $insertName = $_POST['insertNamaKec'];
                $query3 = "INSERT INTO kecamatan(namaKecamatan) VALUES ('$insertName')";
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
                    echo "<td>".$row['namaKecamatan']."</td>";
                    $currNamaKecamatan = $row['namaKecamatan'];
                    echo "<td><input type='text' name='outNamaKec' value=".$row['namaKecamatan'].">";
                    echo '<td><input type="submit" name="edit" value="EDIT">';
                    echo '<td><input type="submit" name="delete" value="DELETE">';
                    echo '<input id="rahasia" type="text" value='.$row["idKecamatan"].' name="rahasia">';
                    echo '<input id="rahasia" type="text" value='.$row["namaKecamatan"].' name="rahasia2">';
                    echo "</form>";
                }
                echo "</form>";
            ?>
</body>
</html>