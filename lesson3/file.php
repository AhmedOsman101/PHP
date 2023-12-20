<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (!empty(($_FILES))) {
        $file = $_FILES["file"];
        switch ($file["type"]) {
            case 'image/png':
                $ext = ".png";
                break;
            case 'image/jpg':
                $ext = ".jpg";
                break;
            case 'image/jpeg':
                $ext = ".jpg";
                break;
            default:
                $ext = null;
                echo "invalid file";
                break;
        }
        if ($ext) if (move_uploaded_file($file["tmp_name"], time() . $ext)) echo "done";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>file upload</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>

<body>
    <form class="d-flex" enctype="multipart/form-data" method="post">
        <div class="col">
            <div class="mb-3">
                <label for="" class="form-label">Choose a file</label>
                <input type="file" class="form-control" name="file" id="file" placeholder="upload a file" aria-describedby="fileHelpId" />
                <div id="fileHelpId" class="form-text">Upload a file</div>
            </div>
            <input type="submit" value="Submit" class="btn btn-primary">


        </div>
    </form>
</body>

</html>