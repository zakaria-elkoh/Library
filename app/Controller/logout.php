<?php


    session_start();
    session_destroy();
    // exit();
    
    echo "hello from log out";
    
    header('location: ../../index.php');