#!/usr/bin/env php
<?php
    $file = new SplFileObject('china_domains.txt');
    while (!$file->eof()) {
        $domain = trim($file->fgets());

        if (strpos($domain, '.') === false) continue;
?>
forward-zone:
    name: "<?php echo $domain; ?>"
<?php
        for ($i = 1, $size = count($argv); $i < $size; ++$i) {
?>
    forward-addr: <?php echo $argv[$i], "\n"; ?>
<?php
        }
    }
?>
