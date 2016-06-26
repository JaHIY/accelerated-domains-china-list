#!/usr/bin/env php
<?php
    $file = new SplFileObject('china_domains.txt');
    while (!$file->eof()) {
        $domain = trim($file->fgets());

        if (strpos($domain, '.') === false) continue;

        for ($i = 1, $size = count($argv); $i < $size; ++$i) {
?>
server=/<?php echo $domain; ?>/<?php echo $argv[$i], "\n" ?>
<?php
        }
    }
?>

