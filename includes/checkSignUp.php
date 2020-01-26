<?php

if (isset($_POST["newUsername"]) && isset($_POST["newPassword"]) && isset($_POST["newEmail"]))
{
    include("./classes/Register.class.php");
    
    $newUsername = filter_input(INPUT_POST, 'newUsername');
    $newPassword = filter_input(INPUT_POST, 'newPassword');
    $newEmail = filter_input(INPUT_POST, 'newEmail');
    $newUser = new Register($newUsername, $newPassword, $newEmail);
    
}