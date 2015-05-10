<?php
$number = 1234.56;
setlocale(LC_MONETARY, 'en_US');
print money_format('%n', $number);    // $1,234.56
print money_format('%i', $number);    // USD 1,234.56

setlocale(LC_MONETARY, 'fr_FR');
print money_format('%n', $number);    // 1 234,56 Eu
print money_format('%i', $number);    // 1 234,56 EUR

setlocale(LC_MONETARY, 'it_IT');
print money_format('%n', $number);    // Eu 1.235
print money_format('%i', $number);    // EUR  1.235
?>