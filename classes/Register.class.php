<?php

include_once("DB.class.php");

class Register
{
    private $username;
    private $password;
    private $email;
    private $db;

    public function __construct($username, $password, $email) // try creating a user with these parameters
    {
        $this->checkValidation($email, $username, $password);
        if ($this->email === false) {
            $_SESSION["error"] = "Invalid email format.";
        } else {
            $db = new DB();
            $this->db = $db->getDB();
            $this->hashPassword($this->password);
            $this->checkIfUserExists($this->email);
        }
    }

    private function checkValidation($email, $username, $password)  // validate input
    {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->username = filter_var($username, FILTER_SANITIZE_STRING);
        $this->password = filter_var($password, FILTER_SANITIZE_STRING);
    }

    private function checkIfUserExists($email) // check if user already registred
    {
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $_SESSION["error"] = "Email already exists :(";
        } else {
            $this->newUser($this->username, $this->password, $this->email);
            $_SESSION["success"] = "Sign up success! You can now login.";
        }
    }

    public function hashPassword($password) // hash password
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    private function newUser($username, $password, $email) // add user to database
    {
        $stmt = $this->db->prepare("INSERT into users (username, password, email) 
        VALUES (?, ?, ?)");
        $stmt->execute([$username, $password, $email]);
    }
}
