<?php

include_once("DB.class.php");

class Login 
{
    private $username;
    private $password;
    private $email;
    
    public function __construct($username, $password, $email)    
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $db = new DB();
        $this->db = $db->pdo;
        $this->checkIfUserExists($email);
    }

    public function checkIfUserNotExists($email)
    {
        $stmt = $this->db->prepare("SELECT email FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            $_SESSION["signin"] = "Username doesn't exists!";
        } else {
            $this->alreadyUser($this->username, $this->password, $this->email);
            $_SESSION["singin"] = "Sign In success!";
        }
    }

    public function alreadyUser($username, $password, $email)
    {
        $stmt = $this->db->query("SELECT * FROM users (username, password, email) VALUE (?,?,?)");
        $stmt->execute([$username, $password, $email]);
    }
}