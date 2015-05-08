<?php
require_once 'Date/Calc.php';

// April 17, 1790
$date = Date_Calc::dateFormat( 17, 4, 1790, '%A %B %e, %Y');

print "Benjamin Franklin died on $date.";
?>