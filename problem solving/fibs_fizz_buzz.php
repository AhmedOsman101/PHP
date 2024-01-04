<?php
include "fibonacci_memo.php";
function fibs_fizz_buzz($n) {
    $res = [];
    foreach (range(1, $n) as $numbers) {
        if (fibonacci_memo($numbers) % 3 == 0 and fibonacci_memo($numbers) % 5 == 0) array_push($res, 'FizzBuzz');
        elseif (fibonacci_memo($numbers) % 3 == 0) array_push($res, 'Fizz');
        elseif (fibonacci_memo($numbers) % 5 == 0) array_push($res, 'Buzz');
        else {
            array_push($res, fibonacci_memo($numbers));
        }
    }
    return implode("\n", $res);
}
print_r(fibs_fizz_buzz(40));