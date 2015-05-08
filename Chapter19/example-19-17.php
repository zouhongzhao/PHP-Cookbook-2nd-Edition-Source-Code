<?php
function pc_format_currency($amt) {
    // get locale-specific currency formatting information 
    $a = localeconv();
    
    // compute sign of $amt and then remove it
    if ($amt < 0) { $sign = -1; } else { $sign = 1; }
    $amt = abs($amt);
    // format $amt with appropriate grouping, decimal point, and fractional digits 
    $amt = number_format($amt,$a['frac_digits'],$a['mon_decimal_point'],
                         $a['mon_thousands_sep']);
    
    // figure out where to put the currency symbol and positive or negative signs
    $currency_symbol = $a['currency_symbol'];
    // is $amt >= 0 ? 
    if (1 == $sign) {
        $sign_symbol  = 'positive_sign';
        $cs_precedes  = 'p_cs_precedes';
        $sign_posn    = 'p_sign_posn';
        $sep_by_space = 'p_sep_by_space';
    } else {
        $sign_symbol  = 'negative_sign';
        $cs_precedes  = 'n_cs_precedes';
        $sign_posn    = 'n_sign_posn';
        $sep_by_space = 'n_sep_by_space';
    }
    if ($a[$cs_precedes]) {
        if (3 == $a[$sign_posn]) {
            $currency_symbol = $a[$sign_symbol].$currency_symbol;
        } elseif (4 == $a[$sign_posn]) {
            $currency_symbol .= $a[$sign_symbol];
        }
        // currency symbol in front 
        if ($a[$sep_by_space]) {
            $amt = $currency_symbol.' '.$amt;
        } else {
            $amt = $currency_symbol.$amt;
        }
    } else {
        // currency symbol after amount 
        if ($a[$sep_by_space]) {
            $amt .= ' '.$currency_symbol;
        } else {
            $amt .= $currency_symbol;
        }
    }
    if (0 == $a[$sign_posn]) {
        $amt = "($amt)";
    } elseif (1 == $a[$sign_posn]) {
        $amt = $a[$sign_symbol].$amt;
    } elseif (2 == $a[$sign_posn]) {
        $amt .= $a[$sign_symbol];
    }
    return $amt;
}
?>