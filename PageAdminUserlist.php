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
            if(isset($_POST['edit'])){
                $nama = $_POST['outNama'];
                $pass = $_POST['outPass'];
                $noTelp = $_POST['outNoTelp'];
                $username = $_POST['rahasia'];
                if(isset($pass)){
                    $query2 = "UPDATE User SET nama = '$nama', pass = md5('$pass'), nomorTelepon = $noTelp WHERE username = '$username'";
                }else{
                    $query2 = "UPDATE User SET nama = '$nama', nomorTelepon = $noTelp WHERE username = '$username'";
                }
                $con->query($query2);
            }
            $result = $con->query($query);
                echo "<h1>List User</h1>";
                echo "<table>";
                echo "<tr>";
                echo "<th>Username</th>";
                echo "<th>Nama</th>";
                echo "<th>Password</th>";
                echo "<th>Active</th>";
                echo "<th></th>";
                echo "</tr>";
                while($row = $result->fetch_array()){
                    $user = $row["username"];
                    echo "<tr>";
                    echo '<form method='."post".'>';
                    echo '<td>'.$user.'</td>';
                    echo "<td><input type='text' name='outNama' id='outNama' value=".$row['nama']."></td>";
                    //echo "<td>".$row['nama']."</td>";
                    echo "<td><input type='text' name='outPass' id='outPass'></td>";
                    echo "<td><input type='text' name='outNoTelp' id='outNoTelp' value=".$row['nomorTelepon']"></td>";
                    echo "<td></td>";
                    echo '<td><input type="submit" name="edit" value="EDIT"></td>';
                    echo "<input type='text' id='rahasia' name='rahasia' value=".$user.">";
                    //echo "<td>".$row['pass']."</td>";
                    //echo "<td>".$row['JumlahLes']."</td>";
                    echo "</form>";
                }
                echo "</table>";
            ?>
</body>
</html>