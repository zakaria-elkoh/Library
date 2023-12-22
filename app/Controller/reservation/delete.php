<?php

    session_start();

    require_once '../../Database/Database.php';
    require_once '../../Models/Reservation.php';

    echo "hello from dele rese <br>";

    if(isset($_GET['book_id'])) {

        $user_id = $_SESSION['user_id'];
        $target_book_id = $_GET['book_id'];

        $reservation = new Reservation();
        $success = $reservation->deleteReservation($user_id, $target_book_id);

        if($success) {
            echo "<script>alert('Deleted successafully!')</script>";
            header('location: ../../../Views/user/reservatedBook.php');
        } else {
            echo "<script>alert('There is an error deleting this book!')</script>";
            header('location: ../../../Views/user/reservatedBook.php');
        }

    }