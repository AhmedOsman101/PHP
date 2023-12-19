<?php
try {
    $mysql = require(__DIR__ . "/crud.php");
} catch (\Throwable $e) {
    echo "ERROR Occurred: {$e->getMessage()} in line: {$e->getLine()}";
}
$data = $db->getData("products");
function insertRow() {
}
?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <title>CRUD Operations</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Data Table</h1>
        <table class="table table-bordered table-dark mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will go here -->
                <?php
                foreach ($data as $item) {
                    echo "<tr>";
                    foreach ($item as $key => $value) {
                        if ($key == "created_at" || $key == "updated_on") continue;
                        echo "<td>$value</td>";
                    }
                    echo <<<_END
                    <td>
                        <button class="btn btn-primary btn-sm"><a href=""></a>Update</button>
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </td>
                    </tr>
                    _END;
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary" id="addBtn">Add New</button>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>