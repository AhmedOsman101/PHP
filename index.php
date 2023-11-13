<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <form action="index.php" method="post">
            <div class="mt-5 mb-3">
                <label class="form-label">Input:</label>
                <input type="text" class="form-control" name="value" placeholder="Enter a value">
            </div>
            <button type="submit" class="btn btn-success" value="submit">Submit</button>
        </form>
    </div>
</body>

</html>
<?php
$value = $_POST["value"];

function removeZeros(string $str)
{
    $result = "";
    $found = false;
    for ($i = 0; $i < strlen($str); $i++) {
        $item = $str[$i];
        if ($item != 0) {
            $found = true;
        }
        if ($found) {
            $result .= $item;
        }
    }
    return $result;
}

// echo removeZeros("001101415");
echo ("<h1 class='text-center'> Output: " . removeZeros($value) . "</h1>");
?>