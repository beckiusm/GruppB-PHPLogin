<?php
include_once('config.php');
session_start();
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $postUsername = filter_input(INPUT_POST, 'username');
    $postPassword = filter_input(INPUT_POST, 'password');
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$postUsername]);
    $row = $stmt->fetch();
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
