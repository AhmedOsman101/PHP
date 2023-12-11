<?php
$oneDay = 86400;
setcookie(
    $name = "cookie_name",
    $value = "cookie_value",
    $expires_or_options = (time() + $oneDay),
); // expires after 1 day
// print the cookie we made
echo ($_COOKIE['cookie_name'] . "<br>");
// more examples
setcookie("fav_food", "PIZZA", time() + ($oneDay * 2)); // expire after 2 days
setcookie("fav_drink", "COFFEE", time() + ($oneDay * 3)); // expire after 3 days
setcookie("fav_dessert", "ICE CREAM", time() + ($oneDay * 4)); // expire after 4 days
// check if a cookie exist or not (trying exsiting cookie)
if (isset($_COOKIE["fav_food"])) echo "BUY SOME " . $_COOKIE["fav_food"] . " !!! <br>";
else echo "I don't know your favorite food <br>";
// check if a cookie exist or not (trying non exsiting cookie)
if (isset($_COOKIE["fav_meal"])) echo "BUY SOME " . $_COOKIE["fav_meal"] . " !!! <br>";
else echo "I don't know your favorite meal <br>";
// print the cookie variable
echo "<pre>";
var_export($_COOKIE);
echo "</pre>";
