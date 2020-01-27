<?php
use PHPUnit\Framework\TestCase;
include_once("./classes/Register.class.php");

class registerTest extends TestCase
{
    public function testLoginIsObject()
    {
        $username = "TestUser";
        $password = "123";
        $email = "123@hotmail.com";
        $this->assertIsObject(new Register($username, $password, $email));
    }
    public function testLoginIsObject123()
    {
        $username = "TestUser";
        $password = "123";
        $email = "123@hotmail.com";
        $this->assertIsObject(new Register($username, $password, $email));
    }
}