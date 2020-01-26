<?php
if (isset($_POST["newUsername"]) && isset($_POST["newPassword"]) && isset($_POST["newEmail"]))
{
    include("../classes/Register.class.php");
    
    $newUsername = filter_input(INPUT_POST, 'newUsername');
    $newPassword = filter_input(INPUT_POST, 'newPassword');
    $newEmail = filter_input(INPUT_POST, 'newEmail');
    $newUser = new Register($newUsername, $newPassword, $newEmail);
    $_SESSION["signup"] = "User created";
    echo '<script type="text/javascript">
           window.location = "../"
      </script>';
}
else 
{
    $_SESSION["signup"] = "Error when adding user";
}