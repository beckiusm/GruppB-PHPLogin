<?php
$title = "Login";
include("includes/header.php");
include("includes/checklogin.php");


if (empty($_SESSION["username"])) {
    include("includes/login.php");
} else {
    include("includes/loggedin.php");
}

include("includes/footer.php");
