<?php

    include('../include/connection.php');
    session_start();

    if($_SESSION['role'] == 3 || $_SESSION['role'] == 1)
    {
        session_destroy();
        header('location: ../index.php');
    }

    // echo $_SESSION['role'];

    if(!$_SESSION['loggedin']){

        session_destroy();

        header('location: ../index.php');
    }

