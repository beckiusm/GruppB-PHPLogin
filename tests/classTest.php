<?php
session_start();
use PHPUnit\Framework\TestCase;

include_once("./classes/Login.class.php");
include_once("./classes/Register.class.php");
include_once("./classes/DB.class.php");

class registerTest extends TestCase
{
    //Mockdata
    public $username = "TestUser";
    public $password = "123";
    public $email = "123@hotmail.com";
    public $notAnEmail = "notAnEmail@gotmail...com";

    public function testClassesIsObject() // test if new instance of class is working
    {
        $login = new Login($this->email, $this->password);
        $register = new Register($this->username, $this->password, $this->email);
        $this->assertIsObject($register);
        $this->assertIsObject($login);
        $db = new DB();
        $this->assertIsObject($db->getDB());
    }

    public function testClassHasAttribute() // test if our variables exist in class
    {
        $this->assertClassHasAttribute("email", Register::class);
        $this->assertClassHasAttribute("username", Register::class);
        $this->assertClassHasAttribute("password", Register::class);
    }

    public function testHashMethod() // test if the hash method is working
    {
        $hashedPw = password_hash($this->password, PASSWORD_DEFAULT);
        $this->assertTrue(password_verify($this->password, $hashedPw));
    }
    public function testEmail() // test if filter method is working
    {
        $this->assertFalse(filter_var($this->notAnEmail, FILTER_VALIDATE_EMAIL));
    }

    public function testSessionEmail() // test if our session variables are getting set
    {
        $this->assertSame($this->email, $_SESSION['email']);
        $this->assertSame($this->username, $_SESSION['username']);
    }

    public function testLogOut() // test if logging out works
    {
        $_SESSION = [];
        $this->assertTrue(empty($_SESSION));
    }
}
