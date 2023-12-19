<?php

    // namespace App\Database;

    require_once __DIR__ . '/../../vendor/autoload.php';

    $dotenv = \Dotenv\Dotenv::createImmutable(__DIR__ . '/../../');
    $dotenv->load();


    class Database 
    {
        private $host;
        private $username;
        private $password;
        private $db;
        private $conn;

        public function __construct() 
        {
            $this->host = $_ENV["BD_localhost"];
            $this->username = $_ENV["BD_userName"];
            $this->dbname = $_ENV["BD_db"]; 
            $this->password = $_ENV["BD_password"];

            $dns = "mysql:host=$this->host;dbname=$this->dbname";

            try {
                $this->conn = new PDO($dns, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                echo "connected to database!";
            } catch (PDOException $e) {
                echo "Connection failed!" . $e->getMessage();
            }
        }

        public function getConn() {
            return $this->conn;
        }
    }

    $o = new Database;
    $o->getConn();
