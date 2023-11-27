<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <form action=<?= $_SERVER["PHP_SELF"] ?> method="post" class="mb-5">
        <div class=" mb-3">
            <label for="username" class="form-label">UserName</label>
            <input type="text" class="form-control" name="username" placeholder="Enter Your Name">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter Your Email">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Enter Your Password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success" name="submit" value="Submit">Submit</button>
        </div>
    </form>

</body>

</html>

<?php
function pre_r($data) {
    echo "<br>";
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}
function generateCards($info = []) {
    if (!empty($info)) {
        $res = "<div class='card w-25'><div class='card-body'>";
        foreach (array_keys($info) as $data) {
            if (empty($info[$data])) {
                echo ("$data is empty");
                return;
            } else if ($data == "submit") continue;
            else {
                $res .= "<h6 class='card-title'>$data:</h6>";
                $res .= "<p class='card-text'>$info[$data]</p>";
            }
        }
        $res .= "</div></div>";
        echo $res;
    }
}
if (isset($_POST["submit"])) generateCards($_POST);
?>