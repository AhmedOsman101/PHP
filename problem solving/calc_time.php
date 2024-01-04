<?php
include("isPrime.php");
function calc_time() {
    // Start the timer
    $start_time = microtime(true);

    // Call your function
    $result = (isPrime(69));

    // Stop the timer
    $end_time = microtime(true);

    // Calculate the difference in microseconds
    $execution_time = $end_time - $start_time;

    echo "The function took " . $execution_time . " seconds to execute.";
}
calc_time();