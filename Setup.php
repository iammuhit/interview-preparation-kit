<?php

namespace App;

class Setup {
    
    public function run(string $filename) {
        $basename = basename($filename, ".php");
        $in = sprintf("%s.in", $basename);
        $out = sprintf("%s/Outputs/%s.out", __DIR__, $basename);

        defined("STDIN") || define("STDIN", fopen($in, "r"));
        defined("STDOUT") || define("STDOUT", str_replace("/", DIRECTORY_SEPARATOR, $out));
        putenv("OUTPUT_PATH=" . STDOUT);
    }
}
