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
    public $notAnEmail = "notAnEmail";

    public function testClassesIsObject()
    {
        $login = new Login($this->email, $this->password);
        $register = new Register($this->username, $this->password, $this->email);
        $this->assertIsObject($register);
        $this->assertIsObject($login);
        $db = new DB();
        $this->assertIsObject($db->getDB());
    }

    public function testClassHasAttribute()
    {
        $this->assertClassHasAttribute("email", Register::class);
        $this->assertClassHasAttribute("username", Register::class);
        $this->assertClassHasAttribute("password", Register::class);
    }

    public function testHashMethod()
    {
        $hashedPw = password_hash($this->password, PASSWORD_DEFAULT);
        $this->assertTrue(password_verify($this->password, $hashedPw));
    }
    public function testEmail()
    {
        $this->assertFalse(filter_var($this->notAnEmail, FILTER_VALIDATE_EMAIL));
    }

    public function testSessionEmail()
    {
        $this->assertSame($this->email, $_SESSION['email']);
    }

    public function testLogOut()
    {
        session_unset();
        session_destroy();
        $this->assertTrue(empty($_SESSION));
    }
}
