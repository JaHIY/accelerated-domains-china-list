#!/usr/bin/env php
<?php
    $size = count($argv);

    if ($size === 1) {
        fwrite(STDERR, "Required at least 1 argument!\n");
        exit(1);
    }

    $file = new SplFileObject('china_domains.txt');
    while (!$file->eof()) {
        $domain = trim($file->fgets());

        if (strpos($domain, '.') === false) continue;
?>
forward-zone:
    name: "<?php echo $domain; ?>"
<?php
        for ($i = 1; $i < $size; ++$i) {
?>
    forward-addr: <?php echo $argv[$i], "\n"; ?>
<?php
        }
    }
?>
