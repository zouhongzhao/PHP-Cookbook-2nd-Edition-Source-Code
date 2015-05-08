<?php
$start = microtime(true);
for ($i = 0; $i < 1000; $i++) {
    preg_match('/age=\d+/',$_SERVER['QUERY_STRING']);
}
$end = microtime(true);
$elapsed = $end - $start;