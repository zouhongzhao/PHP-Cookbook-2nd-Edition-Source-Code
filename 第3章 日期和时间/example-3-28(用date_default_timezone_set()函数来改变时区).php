<?php
$now = time();
date_default_timezone_set('America/New York');
print date('c', $now);
date_default_timezone_set('Europe/Paris');
print date('c', $now);
?>