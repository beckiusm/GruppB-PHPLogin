<?php
session_start(); // have to start session again since we're not including header.php
$_SESSION = []; // empty session array to log out
header("Location: ../index.php"); // send us back to login page
