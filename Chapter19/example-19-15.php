<?php
$income = 5549.3;
$debit  = -25.95;

$formats = array('%i', // international
                 '%n', // national
                 '%+n', // + and -
                 '%(n', // () for negative
                 );

setlocale(LC_ALL, 'en_US');
foreach ($formats as $format ) {
    print "$income @ $format = " .
        money_format($format,$income) .
        "\n";
    print "$debit @ $format = " .
        money_format($format,$debit) .
        "\n";
}
?>