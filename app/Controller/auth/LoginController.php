<?php


    // namespace App\controller\auth;
    session_start();

    require_once '../../models/User.php';
    require_once '../../Database/Database.php';

    class LoginController 
    {
        public $conn;

        public function __construct() {
            $database = new Database();
            $this->conn = $database->getConn();
        }

        public function logIn($email, $password) {
            $user = new User();
            $userInfo = $user->login($email, $password);

            if ($userInfo === null) { 
                $msg = "User not found";
                header("location: ../../../Views/auth/login.php?msg=$msg");
            } elseif ($userInfo === false) {
                $msg = "The password is not correct";
                header("location: ../../../Views/auth/login.php?msg=$msg");
            } else {
                $user_id = $userInfo['id'];
                $sql2 = "SELECT * FROM `user_role` WHERE user_id = ?";
                $stmt2 = $this->conn->prepare($sql2); 
                $stmt2->execute([$user_id]);
                $user_role_arr = $stmt2->fetch(PDO::FETCH_ASSOC);
                
                $_SESSION['user_id'] = $user_id;
                $_SESSION['user_role_id'] = $user_role_arr["role_id"];

                
                if($_SESSION['user_role_id'] == 1) {
                    echo "hello admin from the log in controller";
                    header("location: ../../../index.php");
                } else {
                    echo "hello user from the log in controller";
                    header("location: ../../../index.php");
                }


            }
        }
    }


    // add a user
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $authenticationController = new LoginController();
        $authenticationController->logIn($email, $password);
    }
?>