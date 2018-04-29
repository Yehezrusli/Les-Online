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
            $idkel = $_POST['rahasia'];
            if(isset($_POST['edit'])){
                $namakel = $_POST['outNamakel'];
                $query2 = "UPDATE kelurahan SET namakelurahan = '$namakel' WHERE idkelurahan = $idkel";
                $con->query($query2);
            }

            if(isset($_POST['delete'])){
                $query4 = "DELETE FROM kelurahan WHERE idkelurahan = $idkel";
                $con->query($query4);
            }
            
            if(isset($_POST['insertButton'])){
                $insertName = $_POST['insertNamakel'];
                $query3 = "INSERT INTO kelurahan(namakelurahan) VALUES ('$insertName')";
                $con->query($query3);
            }
            $result = $con->query($query);
                echo "<h1>List kelurahan</h1>";
                echo '<label>Nama kelurahan: </label><input id="insertNamakel" type="text" name="insertNamakel">';
                echo '<input type="submit" value="Insert kelurahan" id="insertButton" name="insertButton">';
                echo "<table>";
                echo "<tr>";
                echo "<th>idkelurahan</th>";
                echo "<th>Nama kelurahan</th>";
                echo "<th>Ganti Nama kelurahan</th>";
                echo "<th></th>";
                echo "<th></th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["idkelurahan"].'</td>';
                    echo "<td>".$row['namakelurahan']."</td>";
                    $currNamakelurahan = $row['namakelurahan'];
                    echo "<td><input type='text' name='outNamakel' value=".$row['namakelurahan'].">";
                    echo '<td><input type="submit" name="edit" value="EDIT">';
                    echo '<td><input type="submit" name="delete" value="DELETE">';
                    echo '<input id="rahasia" type="text" value='.$row["idkelurahan"].' name="rahasia">';
                    echo '<input id="rahasia" type="text" value='.$row["namakelurahan"].' name="rahasia2">';
                    echo "</form>";
                }
                echo "</form>";
            ?>
</body>
</html>