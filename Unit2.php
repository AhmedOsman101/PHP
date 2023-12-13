<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FILTER</title>
    <link rel="stylesheet" href="E-commerce\water.css\out\water.css">
    <style>
        input#file-upload-button {
            background-color: "red";
        }
    </style>
</head>


<body>
    <center>
        <div>
            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                </div>
                <div class="mb-3">
                    <label for="file" class="form-label">Choose file</label>
                    <input type="file" class="form-control" name="file" id="file" placeholder="choose file">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </center>

    <?php
    if (!empty($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") {
        foreach ($_POST as $key => $value) {
            if (isset($_POST[$key])) {
                echo "$key added successfully <br>";
                echo $value . "<br>";
            }
        }
    }
    ?>
</body>

</html>