<?php
function calc_time() {
    require('./isPrime.php');
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

// Start the timer
$start_time = microtime(true);

// Call your function
$result = crack(md5(strval(99999)));

// Stop the timer
$end_time = microtime(true);

// Calculate the difference in microseconds
$execution_time = $end_time - $start_time;

echo "The function took " . $execution_time . " seconds to execute.";


// sprintf('%.0', $execution_time)
// calc_time();
