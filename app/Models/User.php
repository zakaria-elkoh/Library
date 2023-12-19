<?php

    require_once '../Database/Database.php';

class User 
{

    private $Database;

    public function __construct () {
        $this->Database = new Database();
    }

    public function create($first_name, $last_name, $email, $phone, $password) {

        $sql = "SELECT * FROM user WHERE email = ?";  
        $stmt = $this->Database->getConn()->prepare($sql); 
        $stmt->execute([$email]);

        if($stmt->rowCount() > 0) {
            echo "user with this email is already exists";
        } else {
            $sql1 = "INSERT INTO user ($first_name, $last_name, $email, $phone, $password) VALUES (?, ?, ?, ?, ?)";  
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt1 = $this->Database->getConn()->prepare($sql1); 
            $success = $stmt->execute([$first_name, $last_name, $email, $phone, $hashedPassword]);
            return $success;
        }   
    }

    public function authenticateUser($email, $password) {
        $stmt = $this->Database->getConn()->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        

        if($result->num_rows > 0) {
            $user = $result->fetch_assoc();

            if(password_verify($password, $user['password'])) {
                return $user;
            } else {
                return false;
            }
        } else {
            return null;
        }

    }
}

$o = new User();
$succ = $o->create("zakaria", "elkoh", "za@gmail.com", "068263746", "1234");
var_dump($succ);