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
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $db = new DB();
        $this->db = $db->getDB();
        $this->hashPassword($password);
        $this->checkIfUserExists($email);
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
