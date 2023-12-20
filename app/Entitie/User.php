<?php




    class User {
        private $first_name;
        private $last_name;
        private $email;
        private $phone;
    
        public function __construct ($first_name, $last_name, $email, $phone) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
            $this->email = $email;
            $this->phone = $phone;
        }

        // getters
        public function getFirstname() {
            return $this->firstname;
        }
        public function getLastname() {
            return $this->lastname;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPhone() {
            return $this->phone;
        }

        // setters
        public function setFirstname($firstname) {
            $this->firstname = $firstname;
        }
        public function setLastname($lastname) {
            $this->lastname = $lastname;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPhone($phone) {
            $this->phone = $phone;
        }

    }
