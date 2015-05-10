<?php
$fh = fopen('compress.zlib://lots-of-data.gz','r') or die("can't open: $php_errormsg");
while ($line = fgets($fh)) {
    // $line is the next line of uncompressed data
}
fclose($fh) or die("can't close: $php_errormsg");
?>