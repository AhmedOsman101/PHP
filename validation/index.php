<?php
session_start();
if (isset($_SESSION["user_Id"])) {
    $mysql = require("Database.php");
    $sql = sprintf("SELECT * FROM `customers` WHERE `id` = %s",  $_SESSION['user_Id']);
    $response = $mysql->query($sql);
    $userData = $response->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>E-commerce</title>
    <link rel="stylesheet" href="./css/water.css" />
    <link rel="stylesheet" href="./css/main.css" />
    <style>
        body {
            display: flex;
            place-content: center;
            place-items: center;
            min-height: 100vh;
        }
    </style>
</head>

<body>
    <main>
        <?php if (isset($userData)) : ?>
            <h1> welcome
                <?= htmlspecialchars($userData["name"]) ?>, how can i help you
            </h1>
            <h2>
                <a rel="noopener noreferrer" href="logout.php">Logout</a>
            </h2>
        <?php else : ?>
            <?php header("Location: signup.php") ?>
        <?php endif; ?>
    </main>
</body>

</html>