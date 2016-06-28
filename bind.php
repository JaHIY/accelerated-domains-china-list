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
zone "<?php echo $domain; ?>" {
    type forward;
    forwarders {
<?php
        for ($i = 1; $i < $size; ++$i) {
?>
        <?php echo $argv[$i], ";\n"; ?>
<?php
        }
?>
    };
<?php
    }
?>

