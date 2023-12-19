<?php
try {
    $mysql = require(__DIR__ . DIRECTORY_SEPARATOR . "crud.php");
} catch (\Throwable $e) {
    echo "<pre>ERROR Occurred: {$e->getMessage()} <br> in line: {$e->getLine()}</pre>";
}
$data = $db->getData("products");
?>
<!DOCTYPE html>
<html data-bs-theme="dark">

<head>
    <title>CRUD Operations [Read]</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="text-center mt-4">Data Table</h1>
        <table class="table table-bordered table-dark mt-4">
            <thead>
                <tr>
                    <th class="text-center">ID</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Price</th>
                    <th class="text-center">Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <!-- Data will go here -->
                <?php
                $confirmed = false;
                foreach ($data as $item) {
                    $id = $item["id"];
                    echo "<tr>";
                    foreach ($item as $key => $value) {
                        if ($key == "created_at" || $key == "updated_on")
                            continue;
                        echo "<td>$value</td>";
                    }
                    echo <<<_END
                    <td class="d-flex justify-content-center">
                        <div class="d-flex justify-content-evenly w-75">
                            <button class="btn btn-primary btn-sm">
                                <a class="nav-link" href="update.php?id=$id">Update</a>
                            </button>
                            <button
                                class="btn btn-danger btn-sm deleteBtn"
                                data-id="$id"
                                data-bs-toggle="modal"
                                data-bs-target="#exampleModal"
                            >
                                Delete
                            </button>
                        </div>
                    </td>
                </tr>
_END;
                }
                ?>
            </tbody>
        </table>
        <button class="btn btn-primary" id="addBtn">
            <a class="nav-link" href="insert.php">Add New</a>
        </button>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body"> Are you sure you want to proceed? </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary deleteBtn" data-bs-dismiss="modal">Cancel</button>
                    <a id="deleteConfirmBtn" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Get delete buttons
        const deleteBtns = document.querySelectorAll('.deleteBtn');
        // Get confirm delete button
        const deleteConfirmBtn = document.getElementById('deleteConfirmBtn');
        // Add click event listener to each delete button
        deleteBtns.forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                // Get id from clicked button
                var id = e.target.getAttribute('data-id');
                // Set href attribute of confirm delete button
                deleteConfirmBtn.setAttribute('href', 'delete.php?id=' + id);
            });
        });
    </script>
</body>

</html>