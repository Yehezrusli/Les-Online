<?php
    include("Header2.php");
    $query = "SELECT * FROM kelurahan"
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
            $idKel = $_POST['rahasia'];
            if(isset($_POST['edit'])){
                $namaKel = $_POST['outNamaKel'];
                $query2 = "UPDATE kelurahan SET namaKelurahan = '$namaKel' WHERE idKelurahan = $idKel";
                $con->query($query2);
            }

            if(isset($_POST['delete'])){
                $query4 = "DELETE FROM Kelurahan WHERE idKelurahan = $idkel";
                $con->query($query4);
            }
            
            if(isset($_POST['insertButton'])){
                $insertName = $_POST['insertNamakel'];
                $query3 = "INSERT INTO kelurahan(namaKelurahan) VALUES ('$insertName')";
                $con->query($query3);
            }
            $result = $con->query($query);
                echo "<h1>List Kelurahan</h1>";
                echo '<label>Nama kelurahan: </label><input id="insertNamakel" type="text" name="insertNamakel">';
                echo '<input type="submit" value="Insert kelurahan" id="insertButton" name="insertButton">';
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
                    echo "<td>".$row['namaKelurahan']."</td>";
                    $currNamaKelurahan = $row['namaKelurahan'];
                    echo "<td><input type='text' name='outNamaKel' value=".$row['namaKelurahan']."></td>";
                    echo '<td><input type="submit" name="edit" value="EDIT"></td>';
                    echo '<td><input type="submit" name="delete" value="DELETE"></td>';
                    echo '<input id="rahasia" type="text" value='.$row["idKelurahan"].' name="rahasia">';
                    echo '<input id="rahasia" type="text" value='.$row["namaKelurahan"].' name="rahasia2">';
                    echo "</form>";
                }
                echo "</form>";
            ?>
</body>
</html>