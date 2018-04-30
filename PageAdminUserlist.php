<?php
    include("Header2.php");
    $query = "SELECT username, nama, pass FROM User";
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
                echo "<h1>List User</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>ID User</th>";
                echo "<th>Username</th>";
                echo "<th>Nama</th>";
                echo "<th>Active</th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$row["username"].'</td>';
                    echo "<td><input type='text' name='outNama' id='outNama' value=".$row['nama']."></td>";
                    //echo "<td>".$row['nama']."</td>";
                    echo "<td><input type='text' name='outNama' id='outNama' value=".$row['pass']."></td>";
                    //echo "<td>".$row['pass']."</td>";
                    //echo "<td>".$row['JumlahLes']."</td>";
                }
                echo "</table>";
            ?>
</body>
</html>