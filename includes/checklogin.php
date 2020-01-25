<?php
    include_once('config.php');
    $loggedIn = false;
    $postUsername = filter_input(INPUT_POST, 'username');
    $postPassword = filter_input(INPUT_POST, 'password');
    $pwCorrect = 0;
    $stmt = $pdo->query("SELECT * FROM users");
    while ($row = $stmt->fetch()) {
        if(password_verify($postPassword, $row['password']))
        {
            $pwCorret = 1;
        } 
        if($row["username"] == $postUsername && $pwCorrect = 1)
        {
            $loggedIn = true;
            session_start();
            $_SESSION["username"] = $row["username"];
            $_SESSION["email"] = $row["email"];
            include('loggedin.php');
        }
    }
    if($loggedIn == false)
    {
        $message = "Wrong username / password";
        //echo "<script type='text/javascript'>console.log('$message');</script>";
        echo "<script>alert('$message');window.location.href='../index.php';</script>";
    }

?>
