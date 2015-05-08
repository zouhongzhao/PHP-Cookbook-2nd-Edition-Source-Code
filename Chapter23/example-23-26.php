<?php
function pc_randomint($max = 1) {
  $m = 1000000;
  return ((mt_rand(1,$m * $max)-1)/$m);
}
?>

$line_number = 0;

$fh = fopen('sayings.txt','r') or die($php_errormsg);
while (! feof($fh)) {
    if ($s = fgets($fh)) {
        $line_number++;
        if (pc_randomint($line_number) < 1) {
            $line = $s;
        }
    }
}
fclose($fh) or die($php_errormsg);
?>