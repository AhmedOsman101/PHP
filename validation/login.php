<?php
echo "<pre>";
$is_Invalid = false;
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $mysql = require(__DIR__ . "/db/database.php");
    $sql = sprintf(
        "SELECT * FROM `customers` WHERE `email` = '%s' ",
        $mysql->real_escape_string($_POST["email"])
    );
    $response = $mysql->query($sql);
    $userData = $response->fetch_assoc();
    if ($userData && password_verify($_POST["password"], $userData["password"])) {
        session_start();
        session_regenerate_id();
        $_SESSION["user_Id"] = $userData["id"];
        header("Location: ../index.php");
        exit;
    }
    $is_Invalid = true;
}

echo "</pre>";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/water.css" />
    <link rel="stylesheet" href="../css/sign-up.css" />
    <link rel="stylesheet" href="../css/main.css" />
    <link rel="stylesheet" href="../css/navbar.css" />
    <style>
        .input-group {
            font-size: 0.875rem;
            flex: 1 0 100%;
            padding: 0.5rem;
        }

        .form-container {
            width: 350px;
        }
    </style>
</head>

<body>
    <main>
        <?php include_once("../components/navbar.html");?>
        <?php if ($is_Invalid): ?>
            <h3 style="color:red;margin-bottom:-2rem;"><em></em>Login Failed!</em></h3>
        <?php endif ?>
        <div class="form-container">
            <p class="title">Login</p>
            <form class="form" method="post" novalidate>
                <!-- email -->
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="enter your email"
                        value="<?= htmlspecialchars($_POST["email"] ?? " ") ?>" />
                </div>
                <!-- password -->
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="enter your password" />
                </div>
                <!-- sign in -->
                <input type="submit" value="login" class="sign" />
            </form>
            <br />
            <p class="sign-in"> doesn't have an account? <a rel="noopener noreferrer"
                    href="./signup.php">sign-up</a>
            </p>
        </div>
    </main>
</body>

</html>