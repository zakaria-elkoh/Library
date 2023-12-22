<?php

    require_once '../../../app/Database/Database.php';
    require_once '../../../app/Models/Book.php';

    if(isset($_GET['id'])) {
        $target_id = $_GET['id'];

        $book = new Book();
        $book->deleteBook($target_id);

        // echo $target_id;
    }
