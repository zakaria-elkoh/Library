<?php

    session_start();

    require_once '../Database/Database.php';
    require_once '../Models/Reservation.php';

    
    if(isset($_POST['add'])) {

        $user_id = $_SESSION['user_id'];
        $target_book_id = $_GET['book_id'];
        $description = $_POST['description'];
        $start_date = $_POST['start_date'];
        $return_date = $_POST['end_date'];
        $is_returned = 0;

        // echo $user_id . " user<br>";
        // echo $target_book_id . " book<br>";
        // echo $description . " desc <br>";
        // echo $start_date . " start <br>";
        // echo $return_date . "end <br>";
        // echo $is_returned . " is<br>";

        $reservation = new Reservation();
        $success = $reservation->addReservation($user_id, $target_book_id, $description, $start_date, $return_date, $is_returned);

        if($success) {
            echo "<script>alert('Added successafully!')</script>";
            header('location: ../../index.php');
        } else {
            echo "<script>alert('There is an error adding this book!')</script>";
            header('location: ../../index.php');
        }

    }