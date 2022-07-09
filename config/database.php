<?php
    session_start();
    const DB_HOST = "localhost";
    const DB_USER = "root";
    const DB_PASS = "";
    const DB_NAME = "Lukasproject";

    // Create connection
    $_SESSION['conn'] = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
    //var_dump($_SESSION['conn']);
    if($_SESSION['conn']->connect_error)
    {
        die("Connection failed! " . $_SESSION['conn']->connect_error);
    }
    //echo "Connected!";