<?php

require dirname(__DIR__) . "/Setup.php";

$setup = new App\Setup;
$setup->run(__FILE__);

/*
 * Complete the 'countingValleys' function below.
 *
 * The function is expected to return an INTEGER.
 * The function accepts following parameters:
 *  1. INTEGER steps
 *  2. STRING path
 */

function countingValleys($steps, $path) {
    $level = 0;
    $count = 0;

    for($i=0; $i<$steps; $i++) {
        if($path[$i] == "U") {
            $level += 1;
        } else if($path[$i] == "D") {
            $level -= 1;
        }

        if($level == 0 && $path[$i] == "U") {
            $count += 1;
        }
    }

    return $count;
}

$fptr = fopen(getenv("OUTPUT_PATH"), "w");
$steps = intval(trim(fgets(STDIN)));
$path = rtrim(fgets(STDIN), "\r\n");
$result = countingValleys($steps, $path);

fwrite($fptr, $result . "\n");
fclose($fptr);
