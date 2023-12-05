<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <center>
        <h1>Login succeed !</h1>
    </center>
    <a href="sessions.php">click me!</a><br>
</body>

</html>
<?php
foreach ($_SESSION as $key => $value) echo $key . " => " . $value . "<br>";
?>