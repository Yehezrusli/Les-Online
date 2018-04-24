<?php
    // create connection
    $con = new mysqli("localhost", "root", "", "lesonline");

    //check connection
    if($con->connect_errno){
        echo "failed to connect";
    }

?>