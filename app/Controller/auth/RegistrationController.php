<?php
    require_once '../../Database/Database.php';
    require_once '../../models/User.php';

    

    

    class RegistrationController 
    {
        // private $conn;

        // public function __construct() {
        //     $db = new Database();
        //     $this->conn = $db->connect();
        // }

        public function register($firstname, $lastname, $email, $password, $phone) {
            
                $User = new User();
                $success = $User->create($firstname, $lastname, $email, $password, $phone);


                if ($success) {
                    header('location: ../../../views/auth/login.php');
                    // echo "user added with succ!";
                } else {
                    echo "there is an error in registering!";
                }
        }         
    }
    

    // add a user
    if (isset($_POST['submit'])) {
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        $registrationController = new RegistrationController();
        $registrationController->register($firstname, $lastname, $email, $phone, $password);
    }



?>
