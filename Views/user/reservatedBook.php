
<?php

    session_start();
    require_once "../../app/Database/Database.php";
    require_once "../../app/Models/Book.php";

    $book = new Book();
    $books = $book->getReservatedBooks(19);
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>library</title>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css"> -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black">

    <?php require_once '../../includs/header.php'; ?>

    <section class="books">
        <div class="container mx-auto pt-20">
            <div class="books-wrapper grid grid-cols-3 gap-6">

                <?php foreach($books as $book) : ?>
                    <div  class="book flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="../../Public/Imgs/<?= $book['id'] ?>.png" alt="img">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $book['title'] ?> | <?= $book['publication_year'] ?></h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $book['description'] ?></p>
                            <a href="../../app/Controller/reservation/delete.php?book_id=<?= $book['id'] ?>" class="text-white w-fit ms-auto mt-6 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cancel</a>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>

    


</body>
</html>