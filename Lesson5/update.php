<?php
session_start(); // Start the session

try {
    $mysql = require("crud.php");
} catch (\Throwable $e) {
    echo "ERROR Occurred: {$e->getMessage()} in line: {$e->getLine()}";
}

$id = $_GET["id"];

$data = $db->getData("products", $id)[0];

// Set session variables to retain form data after redirection
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $res = $db->updateData($id, $_POST);
    $_SESSION['form_data'] = $_POST; // Store form data in session
    $script = <<<EOD
        <script>
            setTimeout(function() {
                window.location.href = 'index.php';
            }, 1000); // Redirect after 5 seconds
        </script>
    EOD;
    echo $script;
}

// Retrieve form data from session or use empty array if not set
$formData = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
unset($_SESSION['form_data']); // Unset session data after use to prevent it from persisting

?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <title>CRUD Operations [Update]</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $formData["name"] ?? $data["name"] ?? "" ?>" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description" value="<?= $formData["description"] ?? $data["description"] ?? "" ?>" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" value="<?= $formData["price"] ?? $data["price"] ?? "" ?>" required>
            </div>
            <div class="mb-3">
                <?php if (isset($res)) : ?>
                    <span class='text-success'>Updated Successfully</span>
                    <?php exit ?>
                <?php endif ?>
            </div>
            <input type="submit" class="btn btn-primary" value="Update item">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>