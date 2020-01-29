<?php


if (isset($_POST["email"]) && isset($_POST["password"])) {
    include_once('./classes/Login.class.php');
    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');
    $checkLogin = new Login($email, $password);
}
