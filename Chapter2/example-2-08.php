<?php
$two  = bi_from_str('2');
$four = bi_add($two, $two);
print bi_to_str($four)            // Prints 4

// Computing large factorials very quickly
$factorial = bi_fact(20);         // 2432902008176640000
?>