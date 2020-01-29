<?php

if (isset($_POST["newUsername"]) && isset($_POST["newPassword"]) && isset($_POST["newEmail"])) {
    include("./classes/Register.class.php");

    $newUsername = filter_input(INPUT_POST, 'newUsername', FILTER_SANITIZE_STRING);
    $newPassword = filter_input(INPUT_POST, 'newPassword', FILTER_SANITIZE_STRING);
    $newEmail = filter_input(INPUT_POST, 'newEmail', FILTER_SANITIZE_EMAIL);

    $checkSignUp = new Register($newUsername, $newPassword, $newEmail);
}
