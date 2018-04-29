<?php
    include("Header3.php");
    include("connection.php");
    session_start();
    $temp =  $_SESSION['uname'];
    $query2 = "SELECT idGuru FROM guru WHERE username = '$temp'";
    if($result = $con->query($query2)){
        while($row = $result->fetch_array()){
        $id = $row['idGuru'];
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" media="screen" href="PageGuru.css" />

</head>
<body>
    <div class="tabwaktu">
        <form method="get" action="">
            <fieldset>
                <legend>Input Waktu Les</legend>
                <label>Hari: </label>
                <select name="hari">
                    <option value="Senin">Senin</option>
                    <option value="Selasa">Selasa</option>
                    <option value="Rabu">Rabu</option>
                    <option value="Kamis">Kamis</option>
                    <option value="Jumat">Jumat</option>
                    <option value="Sabtu">Sabtu</option>
                    <option value="Minggu">Minggu</option>
                </select>
                <br>
                <label>Available Time: </label>
                <select name="waktu">
                    <option value="13.00-14.00">13.00-14.00</option>
                    <option value="14.00-15.00">14.00-15.00</option>
                    <option value="15.00-16.00">15.00-16.00</option>
                    <option value="16.00-17.00">16.00-17.00</option>
                </select>
                <br>
                <label>Mata Pelajaran:</label>
                <select name="pelajaran">
                <?php
                    $query = "SELECT * FROM pelajaran";
                        if($result = $con->query($query)){
                            while($row = $result->fetch_array()){
                                echo '<option value='.$row['idPelajaran'].'>'.$row['mataPelajaran'].'</option>';
                            }
                        }
                    ?>
                </select>
                <br>
                <br>
                <input type="submit" name="add" value="ADD">
            </fieldset>
            </form>

            <?php
                    if(isset($_GET['add'])){
                        $hari = $_GET['hari'];
                        $jam = $_GET['waktu'];
                        $pel = $_GET['pelajaran'];

                        $query = "INSERT INTO jadwal(idGuru, jam, idPelajaran, available, hari) VALUES($id, '$jam', $pel, 1, '$hari')";
                        $con->query($query);
                        header("Location:PageGuruHome.php");

                        }
            ?>
            <form action="" method="post">
                <fieldset>
                <?php
                    if(isset($_POST['hapus'])){
                    $id = $_POST['rahasia'];
                    $query = "DELETE FROM jadwal WHERE idJadwal = $id";
                    $con->query($query);
                    header("Location:PageGuruHome.php");

                }
                    $query = "SELECT jadwal.hari AS hari, jadwal.jam as jam, pelajaran.mataPelajaran as matPel, jadwal.idJadwal AS id FROM jadwal JOIN pelajaran on jadwal.idPelajaran=pelajaran.idPelajaran WHERE jadwal.idGuru = $id AND jadwal.available = 1 ORDER BY id";
                    $result = $con->query($query);
                    if($result->num_rows == 0){
                        echo "<h1>BELUM MEMILIKI JADWAL</h1>";
                    }else{
                        echo "<h1>Jadwal</h1>";
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Hari</th>";
                        echo "<th>Jam</th>";
                        echo "<th>Mata Pelajaran</th>";
                        echo "<th></th>";
                        echo "</tr>";
                        while($row = $result->fetch_array()){
                            echo "<tr>";
                            echo '<form method='."post".'>';
                            echo '<td>'.$row["hari"].'</td>';
                            echo "<td>".$row['jam']."</td>";
                            echo "<td>".$row['matPel']."</td>";
                            echo '<td><input type="submit" name="hapus" value="DELETE" onclick="hapus(1)">';
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
