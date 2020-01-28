<?php

include_once("DB.class.php");

class Register
{
    private $username;
    private $password;
    private $email;
    private $db;

    public function __construct($username, $password, $email)
    {
        $this->checkValdation($email, $username, $password);
        if($this->email == false) {
            echo "You shall not register with a bad email from api/terminal";
        }else {
            $db = new DB();
            $this->db = $db->getDB();
            $this->hashPassword($this->password);
            $this->checkIfUserExists($this->email);
        }
       
    }

    private function checkValdation($email, $username, $password) {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->username = filter_var($username, FILTER_SANITIZE_STRING);
        $this->password = filter_var($password, FILTER_SANITIZE_STRING);
    }

    private function checkIfUserExists($email)
    {
       
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $_SESSION["signup"] = "Username already exists :(" ;
        } else {
            $this->newUser($this->username, $this->password, $this->email);
            $_SESSION["signup"] = "Sign up success! You can now login.";
        }
    }

    public function hashPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    private function newUser($username, $password, $email)
    {
        $stmt = $this->db->prepare("INSERT into users (username, password, email) 
        VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);
    }
}

