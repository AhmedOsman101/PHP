<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>HOME</title>
</head>

<body>
    <center>
        <h1>HOME PAGE !</h1>
    </center>
    <a href="target.php">click me!</a></br>
    <form action="sessions.php" method="post">
        <input type="submit" value="logout" name="logout">
    </form>
</body>
<?php
$_SESSION["username"] = "Othman"; // create a new session key-value pair
$_SESSION["email"] = "Othman@outlook.com";

if (isset($_POST["logout"])) session_destroy(); // session_destroy => ends the session and deletes the data
else foreach ($_SESSION as $key => $value) echo $key . " => " . $value . "<br>";
?>

</html>