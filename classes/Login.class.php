<?php
include_once("DB.class.php");

class Login
{
    private $password;
    private $email;
    private $db;

    public function __construct($email, $password) // try log in with these credentials
    {
        $this->checkValidation($email, $password);
        $this->setPassword($password);
        $this->setEmail($email);
        $db = new DB();
        $this->setDB($db);
        $this->checkIfEmailExists($this->email);
    }

    protected function setDB($db)
    {
        $this->db = $db->getDB();
    }

    protected function setEmail($email)
    {
        $this->email = $email;
    }
    protected function setPassword($password)
    {
        $this->password = $password;
    }

    private function checkValidation($email, $password) // validate input
    {
        $this->email = filter_var($email, FILTER_VALIDATE_EMAIL);
        $this->password = filter_var($password, FILTER_SANITIZE_STRING);
    }

    public function checkIfEmailExists($email) // check if user in database
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $row = $stmt->fetch();

        if ($stmt->rowCount() > 0) {
            $this->checkLogin($row);
        } else {
            $_SESSION["error"] = "Email is wrong/does not exist";
        }
    }

    public function checkLogin($row) // compares password
    {
        if (password_verify($this->password, $row['password'])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
        } else {
            $_SESSION["error"] = "Wrong password";
        }
    }
}
