<?php

    // require_once '../Database/Database.php';

class Book 
{

    private $Database;

    public function __construct () {
        $this->Database = new Database();
    }

    public function getBooks() {
        $sql = "SELECT * FROM book";  
        $stmt = $this->Database->getConn()->prepare($sql); 
        $stmt->execute();
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($books);
        return $books;
    }
    
    
}

// $o = new Book();
// $o->getBooks();