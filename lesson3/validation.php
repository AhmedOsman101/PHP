<?php
// define variables and set to empty values
$emailErr = $phoneErr = $ageErr = "";
$email = $phone = $age = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // validate email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // check if e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // validate phone
    if (empty($_POST["phone"])) {
        $phoneErr = "Phone number is required";
    } else {
        $phone = test_input($_POST["phone"]);
        // check if phone number is well-formed
        if (!preg_match("/^[0-9]{3}-[0-9]{4}-[0-9]{4}$/", $phone)) {
            $phoneErr = "Invalid phone number format";
        }
    }

    // validate age
    if (empty($_POST["age"])) {
        $ageErr = "* Age is required";
    } else {
        $age = test_input($_POST["age"]);
        // check if age is a number
        if (!is_numeric($age)) {
            $ageErr = "* Invalid age";
        }
    }
}

// function to sanitize data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FILTER</title>
    <link rel="stylesheet" href="E-commerce\water.css\out\water.css" />
    <style>
        input#file-upload-button {
            background-color: "red";
        }
    </style>
</head>

<body>
    <h2>PHP Form Validation Example</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="email">Email: </label><input type="text" name="email" />
        <span class="error">
            <?php echo $emailErr; ?></span>
        <br />
        <label for="phone">Phone: </label><input type="text" name="phone" />
        <span class="error">
            <?php echo $phoneErr; ?></span>
        <br />
        <label for="age">Age:</label> <input type="text" name="age" />
        <span class="error">
            <?php echo $ageErr; ?></span>
        <br />
        <input type="submit" name="submit" value="Submit" />
    </form>


    <?php
    echo "<h2>Your Input:</h2>";
    echo $email;
    echo "<br>";
    echo $phone;
    echo "<br>";
    echo $age;
    ?>
</body>

</html>