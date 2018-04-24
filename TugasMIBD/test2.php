<?php
    include("connection.php");
    $query = "SELECT userName, pass FROM user";
    $uname = $_GET['username'];
    $password = $_GET['password'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        #bungkus {
            margin-top: 10%;
        }

        h1 {
            text-align: center;
        }

        fieldset {
            border: 1px solid;
        }

        label {
            display: inline-block;
            margin-bottom: 3px;
            width: 200px;
            margin-top:  10px;
        }

        input[type=text] {
            width: 200px;
            height: 20px;
            display: inline-block
        }

        input[type=password] {
            width: 200px;
            height: 20px;
            display: inline-block
        }

        div {
            width: 530px;
            margin-right: auto;
            margin-left: auto;
        }

        input[type= button] {
            float: right;
            margin-left: 5px;
            width: 100px;
            height: 25px;
            border: 2px #CCCCCC solid;
            border-radius: 5px;
        }
    </style>
</head>

<body>
    <div id="bungkus">
        <h1>Les Private Simulator</h1>
        <br>
        <br>
        <div id="isi">
            <form method="post" action="">
                <fieldset>
                    <legend>Log In</legend>
                    <label> User Name
                    </label>
                    <br>
                    <input name="username" type="text">

                    <br>
                    <label>Password
                    </label>
                    <br>
                    <input name="password" type="password">
                    <br>
                    <br>
                    <input type="button" value="Sign Up" onclick="window.location='SignUp.html';">
                    <input type="submit" value="Log In" name:"login">
                </fieldset>
             </form>
             <?php
                    $query = "SELECT userName, pass FROM user WHERE userName = '$uname'" ;
                    $result = $con->query($query);

                    echo $uname;
                    if(isset('login')){
                        if(is_null($uname)){
                            echo 'Usernama Harus Diisi';
                        } else if(is_null($password)){
                            echo 'Password Harus Diisi';
                        } else if($result && $result->num_rows > 0){
                            $row = $result->fetch_array();
                            if($row['pass'] == $password){
                                window.location='PageMuridHome.html';
                                echo "succest";
                            }else{
                                echo "Wrong Password";
                            }
                        }
                    }
                
             ?>
        </div>
    </div>
</body>

</html>

