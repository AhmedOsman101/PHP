<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
</head>

<body>
    HOME PAGE !
    <a href="target.php">click me!</a><br>
</body>
<?php
$_SESSION["username"] = "Othman";
$_SESSION["email"] = "Othman@outlook.com";

foreach ($_SESSION as $key => $value) {
    echo $key . " => " . $value . "<br>";
}
?>

</html>