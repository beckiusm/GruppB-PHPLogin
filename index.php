<?php
$title = "Login";
include("includes/config.php");
include("includes/header.php");

$stmt = $pdo->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    echo $row["username"];
}

include("includes/footer.php");
?>
