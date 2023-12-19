<?php
    require '../../../config/Database.php';
    require '../../models/User.php';

    class RegistrationController 
    {
        public $conn;

        public function __construct() {
            $db = new Database();
            $this->conn = $db->connect();
        }

        public function register($firstname, $lastname, $email, $password, $phone) {
            
                $User = new User();
                $success = $User->create($firstname, $lastname, $email, $password, $phone);

                if ($success) {
                    header('location: ../../../views/auth/login.php');
                } else {
                    echo "there is an error in registering!";
                }
        }         
    }
    

    // add a user
    if (isset($_POST['submit'])) {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $registrationController = new RegistrationController();
        $registrationController->register($firstname, $lastname, $email, $password, $phone);
    }


?>
