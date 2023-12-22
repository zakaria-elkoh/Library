<?php
    // namespace App\Models;
    // use App\Database\Database;

    // require_once '../../Database/Database.php';

class Book 
{

    private $Database;

    public function __construct () {
        $this->Database = new Database();
    }

    public function getBook($target_book_id) {
        $sql = "SELECT * FROM book WHERE id = $target_book_id";  
        $stmt = $this->Database->getConn()->prepare($sql); 
        $stmt->execute();
        $book = $stmt->fetch(PDO::FETCH_ASSOC);

        return $book;
    }

    public function getBooks() {
        $sql = "SELECT * FROM book";  
        $stmt = $this->Database->getConn()->prepare($sql); 
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }

    public function getReservatedBooks($user_id) {
        $sql = "SELECT * FROM resevation INNER JOIN book on resevation.book_id = book.id WHERE user_id = $user_id";  
        $stmt = $this->Database->getConn()->prepare($sql); 
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $books;
    }

    public function deleteBook($target_book_id) {
        $sql = "DELETE FROM `book` WHERE id = ?";
        $stmt = $this->Database->getConn()->prepare($sql);
        $succses = $stmt->execute([$target_book_id]);

    }

    public function getAvailability($target_book_id) {
        $sql = "SELECT available_copies FROM `book` WHERE id = ?";
        $stmt = $this->Database->getConn()->prepare($sql);
        $succses = $stmt->execute([$target_book_id]);

        $avalableNumArr = $stmt->fetch(PDO::FETCH_ASSOC);
        $avalableNum = $avalableNumArr['available_copies'];

        return $avalableNum;
    }
    
    
}
