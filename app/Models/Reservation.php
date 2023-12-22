<?php

    


    class Reservation 
    {
    
        private $Database;
    
        public function __construct () {
            $this->Database = new Database();
        }

        public function addReservation($user_id, $book_id, $description, $reservation_date, $return_date, $is_returned) {

            $sql = "INSERT INTO `resevation`(`user_id`, `book_id`, `description`, `reservation_date`, `return_date`, `is_returned`) VALUES ( ?, ?, ?, ?, ?, ?)";  
            $stmt = $this->Database->getConn()->prepare($sql); 
            $success = $stmt->execute([$user_id, $book_id, $description, $reservation_date, $return_date, $is_returned]);

            return $success;
        }

        public function getReservations() {

            $sql = "SELECT * FROM resevation";  
            $stmt = $this->Database->getConn()->prepare($sql); 
            $stmt->execute();
            $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $reservations;
        }

        public function deleteReservation($user_id, $book_id) {

            $sql = "DELETE FROM resevation WHERE user_id = ? AND book_id = ? LIMIT 1";  
            $stmt = $this->Database->getConn()->prepare($sql); 
            $success = $stmt->execute([$user_id, $book_id]);

            return $success;
        }

    }
    