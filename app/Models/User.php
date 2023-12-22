<?php

    // namespace App\Models;
    // require_once '../../Database/Database.php';


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
            $sql1 = "INSERT INTO user (first_name, last_name, email, phone, password) VALUES (?, ?, ?, ?, ?)";  
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt1 = $this->Database->getConn()->prepare($sql1); 
            $success = $stmt1->execute([$first_name, $last_name, $email, $phone, $hashedPassword]);

            if ($success) {
                $lastId = $this->Database->getConn()->lastInsertId();
                $sql1 = "INSERT INTO user_role (user_id, role_id) VALUES (?, ?)";
                $stmt1 = $this->Database->getConn()->prepare($sql1); 
                $success = $stmt1->execute([$lastId, 2]);
                return $success;
            }

        }
    }

    public function login($email, $password) {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = $this->Database->getConn()->prepare($sql);
        // $stmt->bind_param("s", $email);
        $success = $stmt->execute([$email]);
        // $result = $stmt->get_result();

        if($stmt->rowCount() > 0) {
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if(password_verify($password, $user['password'])) {
                return $user;
            } else {
                // echo "The password is not correct!";
                return false;
            }
        } else {
            // echo "User not found!";
            return null;
        }

    }

    public function getUsers() {
        $sql = "SELECT * FROM user";
        $stmt = $this->Database->getConn()->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

}

// $o = new User();
// $succ = $o->getUsers();
// var_dump($succ);