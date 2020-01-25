<?php
$title = "Login";
include("classes/Register.class.php");
include("includes/header.php");
session_unset();

if(empty($_SESSION["username"]))
{
    include("includes/login.php");
} 

if(!empty($_SESSION["username"]))
{
    include("includes/loggedin.php");
}

/*$stmt = $pdo->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    echo $row["username"];
}*/

include("includes/footer.php");
?>
