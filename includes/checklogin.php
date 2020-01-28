<?php
include_once('./classes/DB.class.php');
include_once('/classes/Login.class.php');
$db = new DB();
$pdo = $db->pdo;

if ((isset($_POST["email"])) && isset($_POST["password"])) {

    $postEmail= filter_input(INPUT_POST, 'email');
    $postPassword = filter_input(INPUT_POST, 'password');
    $checkLogin = new Login ($newEmail, $newPassword);
}




