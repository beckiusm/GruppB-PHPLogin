<?php

include_once("DB.class.php");

class Login
{
    private $username;
    private $password;
    private $email;
    
    public function __construct($email, $password)
    {
        $this->checkValdation($email, $password);
        $this->password = $password;
        $this->email = $email;
        $db = new DB();
        $this->db = $db->getDB();
        $this->checkIfEmailExists($this->email);
    }

    private function checkValdation($email, $password) 
    {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->password = filter_var($password, FILTER_SANITIZE_STRING);
    }

    public function checkIfEmailExists($email)
    {
       
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username AND email = ?");

        if ($stmt->rowCount() > 0) {
            if (password_verify($postPassword, $row['password'])) {
                $_SESSION["username"] = $row["username"];
                $_SESSION["email"] = $row["email"];
            } else {
                $_SESSION["error"] = "Wrong password";
            }
        } else {
            $_SESSION["error"] = "Username does not exist";
        }
    }

    public function alreadyUser($username, $password, $email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users (username, password, email) VALUE (?,?,?)");
        $stmt->execute([$username, $password, $email]);
    }
}