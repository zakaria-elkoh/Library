<?php




    class Book 
    {

        private $title;
        private $author;
        private $genre;
        private $description;
        private $publication_year;
        private $total_copies;
        private $available_copies;
    
        public function __construct ($title, $author, $genre, $description, $publication_year, $total_copies, $available_copies) {
            $this->title = $title;
            $this->author = $author;
            $this->genre = $genre;
            $this->description = $description;
            $this->publication_year = $publication_year;
            $this->total_copies = $total_copies;
            $this->available_copies = $available_copies;
        }

        // getters
        public function getTitle() {
            return $this->title;
        }
        public function getAuthor() {
            return $this->author;
        }
        public function getGenre() {
            return $this->genre;
        }
        public function getDescription() {
            return $this->description;
        }
        public function getPublicationYear() {
            return $this->publication_year;
        }
        public function getTotalCopies() {
            return $this->Total_copies;
        }
        public function getAvailableCopies() {
            return $this->available_copies;
        }

        // setters
        public function setTitle($title) {
            $this->title = $title;
        }
        public function setAuthor($author) {
            $this->author = $author;
        }
        public function setGenre($genre) {
            $this->genre = $genre;
        }
        public function setDescription($description) {
            $this->description = $description;
        }
        public function setPublicationYear($publication_year) {
            $this->publication_year = $publication_year;
        }
        public function setTotalCopies($Total_copies) {
            $this->Total_copies = $Total_copies;
        }
        public function setAvailableCopies($available_copies) {
            $this->available_copies = $available_copies;
        }

    }
