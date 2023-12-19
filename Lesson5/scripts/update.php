<?php
try {
    $mysql = require("/xampp/htdocs/PHP/Lesson5/Crud.php");
} catch (\Throwable $e) {
    echo "ERROR Occurred: {$e->getMessage()} in line: {$e->getLine()}";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $res = $db->updateData($id, $_POST);
    header("Location: ../index.php");
}



?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <title>CRUD Operations [insert]</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container my-5">
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="desc" required></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" class="form-control" id="price" name="price" required>
            </div>
            <div class="mb-3">
                <?php if (isset($res)): ?>
                    <span class='text-success'>Added Successfully</span>
                <?php endif ?>
            </div>
            <input type="submit" class="btn btn-primary" value="Add Item">
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>