
<?php

    require_once '../../app/Models/Book.php';
    require_once '../../app/Database/Database.php';

    session_start();

    
    if(isset($_GET['book_id'])) {
        $target_book_id = $_GET['book_id'];
        $book = new Book();
        $availableNum = $book->getavailability($target_book_id);
        $book = $book->getBook($target_book_id);
        // echo $availableNum;

        // if($availableNum < 1) {
        //     echo "this book is not available";
        // } else {
        // }

// 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>library</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black">

    <?php require_once '../../includs/header.php'; ?>

    <section class="books">
        <div class="container mx-auto pt-28">
            <?php if($availableNum < 1) echo "<h2 class='text-red-800 text-center font-bold text-4xl mb-14'>This book is not available!</h2>"; ?>
            <div class="books-wrapper grid grid-cols-2">
                    <div  class="book flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="../../Public/Imgs/<?= $book['id'] ?>.png" alt="img">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><?= $book['title'] ?> | <?= $book['publication_year'] ?></h5>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><?= $book['description'] ?></p>
                            <ul class="flex text-sm text-white">
                                <li class="me-2">
                                        <span class="text-xl font-bold text-gray-900 dark:text-white"><?= $book['total_copies'] ?></span>
                                        <span class="text-gray-400">Total</span>
                                </li>
                                <li>
                                        <span class="text-xl font-bold text-gray-900 dark:text-white"><?= $book['available_copies'] ?></span>
                                        <span class="text-gray-400">Available</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <form class="" action="../../app/Controller/ReservationController.php?book_id=<?= $target_book_id ?>" method="post">
                        
                        <label for="date" class="block mb-2 mt-6 text-sm font-medium text-gray-900 dark:text-white">Reservation Date: </label>
                        <div date-rangepicker class="flex items-center">
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="start_date" type="date" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start" required>
                            </div>
                            <span class="mx-4 text-gray-500">to</span>
                            <div class="relative">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                    </svg>
                                </div>
                                <input name="end_date" type="date" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end" required>
                            </div>
                        </div>
                        <label for="message" class="block mb-2 mt-6 text-sm font-medium text-gray-900 dark:text-white">Description: </label>
                        <textarea name="description" id="message" rows="4" class="block p-2.5 mb-6 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your description..."></textarea>

                        <button name="add"  <?php if($availableNum < 1) echo "disabled"; ?> type="submit" class="text-white px-30 <?php if($availableNum < 1) echo 'cursor-not-allowed'; ?> mx-auto block bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add</button>
                    </form>
            </div>
        </div>
    </section>

    


</body>
</html>