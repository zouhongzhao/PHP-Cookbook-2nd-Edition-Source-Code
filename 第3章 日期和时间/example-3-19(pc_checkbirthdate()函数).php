<?php
function pc_checkbirthdate($month,$day,$year) {
    $min_age = 18;
    $max_age = 122;

    if (! checkdate($month,$day,$year)) {
        return false;
    }

    list($this_year,$this_month,$this_day) = explode(',',date('Y,m,d'));

    $min_year = $this_year - $max_age;
    $max_year = $this_year - $min_age;

    print "$min_year,$max_year,$month,$day,$year\n";
    
    if (($year > $min_year) && ($year < $max_year)) {
        return true;
    } elseif (($year == $max_year) && 
              (($month < $this_month) ||
               (($month == $this_month) && ($day <= $this_day)))) {
        return true;
    } elseif (($year == $min_year) &&
              (($month > $this_month) ||
               (($month == $this_month && ($day > $this_day))))) {
        return true;
    } else {
        return false;
    }
}

// check December 3, 1974
if (pc_checkbirthdate(12,3,1974)) {
    print "You may use this web site.";
} else {
    print "You are too young to proceed.";
    exit();
}
?>