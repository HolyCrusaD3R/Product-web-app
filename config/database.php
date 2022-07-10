<?php
    require "./classes/DatabaseConnect.php";
    session_start();
//    const DB_HOST = "localhost";
//    const DB_USER = "root";
//    const DB_PASS = "";
//    const DB_NAME = "Lukasproject";

    // Create connection
    $db = new dbh();
    $_SESSION['conn'] = $db->connect();
    //var_dump($_SESSION['conn']);
    if($_SESSION['conn']->connect_error)
    {
        die("Connection failed! " . $_SESSION['conn']->connect_error);
    }
    //echo "Connected!";