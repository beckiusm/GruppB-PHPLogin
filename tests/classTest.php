<?php

use PHPUnit\Framework\TestCase;

include_once("./classes/Register.class.php");
include_once("./classes/DB.class.php");

class registerTest extends TestCase
{
    public $username = "TestUser";
    public $password = "123";
    public $email = "123@hotmail.com";

    public function testLoginIsObject()
    {
        $register = new Register($this->username, $this->password, $this->email);
        $this->assertIsObject($register);
        $this->assertIsObject(new DB());
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
}
