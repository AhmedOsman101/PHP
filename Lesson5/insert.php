<?php
try {
    $mysql = require("crud.php");
} catch (\Throwable $e) {
    echo "ERROR Occurred: {$e->getMessage()} in line: {$e->getLine()}";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $res = $db->insertFormData($_POST);
    $script = <<<EOD
        <script>
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 1000); // Redirect after 5 seconds
        </script>
    EOD;
    echo $script;
}
?>

<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <title>CRUD Operations [Create]</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $_POST["name"] ?? "" ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $_POST["description"] ?? "" ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $_POST["price"] ?? "" ?>" required>
            </div>
            <div class="mb-3">
                <?php if (isset($res)) : ?>
                    <span class='text-success'>Added Successfully</span>
                    <?php exit ?>
                <?php endif ?>
            </div>
            <input type="submit" class="btn btn-primary" value="Add Item">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>