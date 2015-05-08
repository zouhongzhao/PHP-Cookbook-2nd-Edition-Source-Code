<?php
$fp = fopen('http://www.example.com/something-compressed.bz2','r');
stream_filter_append($fp, 'bzip2.uncompress');
while (! feof($fp)) {
    $data = fread($fp);
    // do something with $data;
}
fclose($fp);
?>