<?php
$title = "Register";
include("includes/config.php");
include("includes/header.php");

$stmt = $pdo->query("SELECT * FROM users");
while ($row = $stmt->fetch()) {
    echo $row["email"];
}

include("includes/footer.php");
?>
