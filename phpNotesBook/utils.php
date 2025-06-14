<?php

declare(strict_types=1);

function println(string $mode = "e", mixed ...$args)
{
    $func = "var_dump";

    match ($mode) {
        "e"=> $func = "echo",
        "p" => $func = "print_r",
        "x" => $func = "var_export",
        "d" => $func = "var_dump",
        default => $func = "var_dump"
    };

    foreach ($args as $arg) {
        if ($func == "echo") {
            echo $arg;
        } else {
            $func($arg);
        }

        if ($mode !== "d") {
            echo " ";
        }
    }

    if ($mode !== "d") {
        echo "\n";
    }
}
