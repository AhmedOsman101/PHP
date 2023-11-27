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
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body body-dark>
    <div class="container">
        <table class="table table-dark table-bordered">
            <tbody>
                <?php gridTraveler_tab(3, 2) ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
function gridTraveler_tab($m, $n) {
    $grid = array_fill(0, $m + 1, array_fill(0, $n + 1, 0));
    $grid[1][1] = 1;
    for ($i = 0; $i <= $m; $i++) {
        for ($j = 0; $j <= $n; $j++) {
            $pos = $grid[$i][$j];
            if ($i + 1 <= $m) $grid[$i + 1][$j] += $pos;
            if ($j + 1 <= $n) $grid[$i][$j + 1] += $pos;
        }
    }
    foreach ($grid as $rows) {
        echo "<tr>";
        foreach ($rows as $cell) {
            echo "<td>$cell</td>";
        }
        echo "</tr>";
    }
    return $grid[$m][$n];
} // var_export(gridTraveler_tab(3, 2)); // var_export(gridTraveler_tab(18, 18)); // var_export(gridTraveler_tab(1, 1));
?>