<?php
// If local time is EST
$time_parts = localtime();
// California (PST) is three hours earlier
$california_time_parts = localtime(time() - 3 * 3600);
?>