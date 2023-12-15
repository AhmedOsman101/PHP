<?php
echo "<pre>";

use GrahamCampbell\ResultType\Success;

$mysql = require(__DIR__ . "/db/database.php");
/* assign value if the $_POST array is not emtpy */
foreach ($_POST as $key => $value) if (empty($value) && $key != "secondAddress") die("$key is required");
foreach ($_POST as $key => $value) $$key = $value;

/* validate email */
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) die("valid email is required");

/* validate password */
if (strlen($password) < 8) die("Password must be at least 8 letters long");
if (!preg_match("/[a-z]/i", $password)) die("Password must contain at least one letter");
if (!preg_match("/[0-9]/", $password)) die("Password must contain at least one number");

/* hashing password */
$password_hash = password_hash($password, PASSWORD_DEFAULT);

/* validate Gender */
if (!empty($radio_group)) {
    if ($radio_group == 'male') $radio_group = true;
    else if ($radio_group == 'female') $radio_group = false;
    else echo "Invalid gender selected.";
} else echo "Please select a gender.";

/* validate phone number */
function validatePhoneNumber(&$phoneNumber) {
    $pattern = '/^\+?([0-9]{1,3})\)?[-. ]?([0-9]{1,4})[-. ]?([0-9]{1,4})[-. ]?([0-9]{1,9})$/';
    $phoneNumber = str_replace(' ', '-', $phoneNumber);
    if (preg_match($pattern, $phoneNumber)) return true;
    else return false;
}

if (!validatePhoneNumber($phone)) die("The phone number is not valid.");

/* validate age */
if (
    gettype(+$age) != "integer"
    || $age < 0
    || $age > 130
) die("Valid Age is Required");

/* Inserting data with mysqli */
$sql = "INSERT INTO `customers`(`name`, `email`, `password`, `phone_number`, `Gender`, `age`, `address_1`, `address_2`) 
        VALUES ( ? , ? , ? , ? , ? , ? , ? , ? )";

$stmt = $mysql->stmt_init();
if (!$stmt->prepare($sql)) die("SQL error: " . $mysql->error);



var_export($_POST);
echo "<br>";

$stmt->bind_param(
    'ssssiiss',
    $username,
    $email,
    $password_hash,
    $phone,
    $radio_group,
    $age,
    $mainAddress,
    $secondAddress
);

try {
    echo "</pre>";
    $stmt->execute();
    header("Location: ../components/sign-up-success.html");
    exit;
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) die("This Email Already Exists");
    else die("An error occurred: " . $e->getMessage());
}
