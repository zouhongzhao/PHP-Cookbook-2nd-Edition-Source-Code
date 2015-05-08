<?php
$number = -1234.56;
setlocale(LC_MONETARY, 'en_US');
print money_format('%n', $number);    // -$1,234.56

print money_format('%(n', $number);   // ($1,234.56)

print money_format('%!n', $number);   // -1,234.56
?>