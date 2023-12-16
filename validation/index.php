<?php
session_start();
if (isset($_SESSION["user_Id"])) {
    $mysql = require(__DIR__ . "/scripts/db/database.php");
    $sql = sprintf("SELECT * FROM `customers` WHERE `id` = {$_SESSION['user_Id']} ");
    $response = $mysql->query($sql);
    $userData = $response->fetch_assoc();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Success</title>
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
        <?php if (isset($userData)): ?>
            <h1> welcome
                <?= htmlspecialchars($userData["name"]) ?>, how can i help you
            </h1>
            <h2><a rel="noopener noreferrer" href="./scripts/logout.php">Logout</a>
            </h2>
        <?php else: ?>
            <h1><a rel="noopener noreferrer" href="./scripts/login.php">Login</a> or <a rel="noopener noreferrer"
                    href="./scripts/signup.php">sign-up</a>
            </h1>
        <?php endif; ?>
    </main>
</body>

</html>