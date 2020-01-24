<?php
    include_once('config.php');

    //print_r($_POST);
    $postUsername = filter_input(INPUT_POST, 'username');
    $postPassword = filter_input(INPUT_POST, 'password');
    $loggedIn = false;

    $stmt = $pdo->query("SELECT * FROM users");
    while ($row = $stmt->fetch()) {
        if($row["username"] == $postUsername && $row["password"] == $postPassword) {
            session_start();
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            $loggedIn = true;
            //header("Location: loggedin.php");
            //header("Location: ../index.php");
            echo "frontpage linked".PHP_EOL;
            include('loggedin.php');
        }
    }

    if($loggedIn == false){
        header("Location: ../index.php");
    }

?>
