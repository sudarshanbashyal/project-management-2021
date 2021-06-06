<?php

    $hostname = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project_management";

    $connection = mysqli_connect($hostname, $username, $password, $dbname);
    
    session_start();
    $_SESSION['userId']=null;
    $_SESSION['userRole']=null;
    $_SESSION['currentCart']=array();

?>