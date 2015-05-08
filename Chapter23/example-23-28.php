<?php
$delim = '|';

$fh = fopen('books.txt','r') or die("can't open: $php_errormsg");
while (! feof($fh)) {
    $s = rtrim(fgets($fh));
    $fields = explode($delim,$s);
    // ... do something with the data ... 
}
fclose($fh) or die("can't close: $php_errormsg");
?>