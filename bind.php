#!/usr/bin/env php
<?php
    $file = new SplFileObject('china_domains.txt');
    while (!$file->eof()) {
        $domain = trim($file->fgets());

        if (strpos($domain, '.') === false) continue;
?>
zone "<?php echo $domain; ?>" {
    type forward;
    forwarders {
<?php
        for ($i = 1, $size = count($argv); $i < $size; ++$i) {
?>
        <?php echo $argv[$i], ";\n"; ?>
<?php
        }
?>
    };
<?php
    }
?>

