<?php
include_once('./classes/DB.class.php');
include_once('/classes/Login.class.php');
$db = new DB();
$pdo = $db->pdo;
if ((isset($_POST["username"]) || isset($_POST["email"])) && isset($_POST["password"])) {
    $postUsername = filter_input(INPUT_POST, 'username');
    $postEmail= filter_input(INPUT_POST, 'email');
    $postPassword = filter_input(INPUT_POST, 'password');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username AND email = ?");
    $stmt->execute([$postUsername], [$postEmail]);
    $row = $stmt->fetch();
    session_start();
    if ($stmt->rowCount() > 0) {
        if (password_verify($postPassword, $row['password'])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
        } else {
            $_SESSION["error"] = "Wrong password";
        }
    } else {
        $_SESSION["error"] = "Username does not exist";
    }

}




