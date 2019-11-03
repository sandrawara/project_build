<?php

class Database {
    //DB Params
    private $host = 'sandrawara.se.mysql';
    private $db_name = 'sandrawara_se_project_w_3_';
    private $username = 'sandrawara_se_project_w_3_';
    private $password = 'dowNthEh!ll';
    private $conn;

     //DB login
     public $user;
     public $pass;
     

    //DB Connect
    public function connect() {
        $this->conn = null;

        try { 
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
            $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo 'Connection error' . $e->getMessage(); // Error message
        }

        return $this->conn;
    } 

     //Login
     public function loginUser($user, $pass) { 

        $query = "SELECT password FROM users WHERE username = '$user'"; 

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        $usera = $stmt->fetch(PDO::FETCH_ASSOC);

        $count = $stmt->rowCount(); 

        if($count > 0) { 
            $storedpassword = $usera['password'];

            //Crypt password
            if($storedpassword == 'admin'){
                
                $_SESSION['username'] = $user;

                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

?>