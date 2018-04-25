<?php
    include("connection.php");
    $query = "SELECT * FROM kecamatan";
    $query2 = "SELECT * FROM kelurahan";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        option{
            width: 178px;
            height: 20px;
        }

        #bungkus {
            margin-top: 10%;
        }

        h1 {
            text-align: center;
        }

        fieldset {
            border: 1px solid;
            margin-bottom: 30px;
        }

        label {
            display: inline-block;
            margin-bottom: 10px;
            margin-left: 25px;
            width: 200px;
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif
        }

        input[type=text] {
            width: 200px;
            height: 20px;
            display: inline-block;
        }

        input[type=password] {
            width: 200px;
            height: 20px;
            display: inline-block;
        }

        input[type=number] {
            width: 200px;
            height: 20px;
            display: inline-block;
        }

        div {
            width: 530px;
            margin-right: auto;
            margin-left: auto;
        }

        input[type=submit] {
            float: right;
            margin-left: 5px;
            width: 100px;
            height: 25px;
            border: 2px #CCCCCC solid;
            border-radius: 5px;
        }

        legend {
            font-size: 25px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }

        p{
            margin: 0px;
            font-size: 20px;
            text-align: right ;
        }

        h4 {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
            font-size: 20px;
            margin: 15px;
            margin-top: 0px;
            margin-bottom: 25px;
            padding: 0%;
        }

        h1 {
            font-size: 45px;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif
        }

        #tabelguru {
            visibility: hidden;
            position: absolute;
        }

        #tabelmurid {
            position: absolute;
            visibility: visible;
        }

        a{
            text-decoration: none;
            color: blue;
        }
    </style>
</head>

<body>
    <div>
        <h1>Sign Up</h1>
        <input id="radioguru" type="radio" onclick="tampil_alamat('1')" name="user" value="Murid" checked/> Murid
        <input id="radiomurid" type="radio" onclick="tampil_alamat('0')" name="user" value="Guru" /> Guru
        <p>already have acout: <a href="Login.php">login</a></p><br>
        <br>
        <br>
        <div id='tabelguru'>
        <form action="" method="post">
            <fieldset>
                <legend>Sign Up</legend>
                <h4>Please Fill The Coloumn Correctly</h4>
                <label>Nama</label>
                <input type="text" id="nama" name="namaG">
                <br>
                <label>User Name</label>
                <input name="uNameG" type="text" id="username">
                <br>
                <label>No KTP</label>
                <input name="KTP" type="text" id="KTP">
                <br>
                <label>Password</label>
                <input name="passG" type="password" id="password">
                <br>
                <label>Confirm Password</label>
                <input name="confirmPassG" type="password" id="confirmpass">
                <br>
                <label>Alamat</label>
                <input name="alamatG" type="text" id="alamat">
                <br>
                <label>Kelurahan</label>
                <select name="KelurahanG">
                <?php
                        if($result = $con->query($query2)){
                            while($row = $result->fetch_array()){
                                echo '<option value='.$row["idKelurahan"].'>'.$row['nama'].'</option>';
                            }
                        }
                    ?>
                    </select>
                <label>Kecamatan</label>
                <select name="KecamatanG">
                <?php
                        if($result = $con->query($query)){
                            while($row = $result->fetch_array()){
                                echo '<option value='.$row['idKecamatan'].'>'.$row['nama'].'</option>';
                            }
                        }
                    ?>
                    </select>
                <br>
                <label>Jenis Kelamin</label>
                <input type="radio" name="genderG" value="laki-laki" / checked> Laki-Laki
                <input type="radio" name="genderG" value="perempuan" /> Perempuan
                <br>
                <br>
                <input type="submit" name="RegisterG" value="Register">
            </fieldset>
        </form>
        </div>
        
        <?php
        if(isSet($_POST["RegisterG"])){
            $pass = $_POST['passG'];
            $hidepass = md5("$pass");
            $cpass = $_POST['confirmPassG'];
            $noKTP = $_POST['KTP'];
            $username = $_POST['uNameG'];
            $nama = $_POST['namaG'];
            $alamat = $_POST['alamatG'];
            $gender = $_POST['genderG'];
            $kecamatan = $_POST['KecamatanG'];
            echo $kecamatan;
            $kelurahan = $_POST['KelurahanG'];
            echo $kelurahan;
            
            if($pass == $cpass){
                $insertUser = "INSERT INTO user(nama, userName, alamat, jenisKelamin, idKecamatan, idKelurahan, pass) VALUES('$nama', '$username', '$alamat', '$gender', $kecamatan, $kelurahan, '$hidepass')";  
                $insertGuru = "INSERT INTO guru(userName, noKTP) VALUES('$username', $noKTP)";
                $con->query($insertGuru);
                $con->query($insertUser);
            } else{
                echo "Password Tidak Cocok";
            }
        }
        ?>

    <form method="post" action="">
        <div id='tabelmurid'>
            <fieldset>
                <legend>Sign Up</legend>
                <h4>Please Fill The Coloumn Correctly</h4>
                <label>Nama</label>
                <input name="namaM" type="text" id="nama">
                <br>
                <label>User Name</label>
                <input name="uNameM" type="text" id="username">
                <br>
                <label>Nama Sekolah</label>
                <input name="sekolah" type="text" id="sekolah">
                <br>
                <label>Kelas</label>
                <input name="kelas" type="number" id="kelas">
                <br>
                <label>Password</label>
                <input name="passM" type="password" id="password">
                <br>
                <label>Confirm Password</label>
                <input name="confirmPassM" type="password" id="confirmpass">
                <br>
                <label>Alamat</label>
                <input name="alamatM" type="text" id="alamat">
                <br>
                <label>Kelurahan</label>
                <select name="kelurahanM">
                <?php
                        if($result = $con->query($query2)){
                            while($row = $result->fetch_array()){
                                echo '<option value='.$row["idKelurahan"].'>'.$row['nama'].'</option>';
                            }
                        }
                    ?>
                    </select>
                <label>Kecamatan</label>
                <select name="kecamatanM">
                <?php
                        if($result = $con->query($query)){
                            while($row = $result->fetch_array()){
                                echo '<option value='.$row['idKecamatan'].'>'.$row['nama'].'</option>';
                            }
                        }
                    ?>
                    </select>
                <br>
                <label>Jenis Kelamin</label>
                <input type="radio" name="genderM" value="laki-laki" / checked> Laki-Laki
                <input type="radio" name="genderM" value="laki-laki" /> Perempuan
                <br>
                <br>
                <input type="submit" value="Register" name="RegisterM">
                </fieldset>
        </form>
        </div>
    </div>
        
    <?php
        if(isSet($_POST["RegisterM"])){
            $pass = $_POST['passM'];
            $hidepass = md5("$pass");
            $cpass = $_POST['confirmPassM'];
            $sekolah = $_POST['sekolah'];
            $kelas = $_POST['kelas'];
            $username = $_POST['uNameM'];
            echo $username;
            $nama = $_POST['namaM'];
            echo $nama;
            $alamat = $_POST['alamatM'];
            echo $alamat;
            $gender = $_POST['genderM'];
            $kecamatan = $_POST['kecamatanM'];
            $kelurahan = $_POST['kelurahanM'];
            if($pass == $cpass){
                $insertUser = "INSERT INTO user(nama, userName, alamat, jenisKelamin, idKecamatan, idKelurahan, pass) VALUES('$nama', '$username', '$alamat', '$gender', $kecamatan, $kelurahan, '$hidepass')";  
                $insertMurid = "INSERT INTO murid(userName, kelas, namaSekolah) VALUES('$username', $kelas, '$sekolah')";
                $con->query($insertUser);
                $con->query($insertMurid);
            } else{
                echo "Password Tidak Cocok";
            }
        }
    ?>
    <script type="text/javascript">

        function tampil_alamat(param) {
            if (param == '0') {
                document.getElementById("tabelguru").style.visibility = 'visible';
                document.getElementById("tabelmurid").style.visibility = 'hidden';
            }
            if (param == '1') {
                document.getElementById("tabelmurid").style.visibility = 'visible';
                document.getElementById("tabelguru").style.visibility = 'hidden';
            }
        }
    </script>
</body>

</html>