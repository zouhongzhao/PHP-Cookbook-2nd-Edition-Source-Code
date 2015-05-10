<?php

if (! (isset($_SERVER['argv'][1]) && isset($_SERVER['argv'][2]))) {
    die("Specify two locales to compare.");
}

$base = 'pc_MC_'.$_SERVER['argv'][1];
$other  = 'pc_MC_'.$_SERVER['argv'][2];

require_once 'pc_MC_Base.php';
require_once "$base.php";
require_once "$other.php";

$base_obj = new $base;
$other_obj = new $other;

/* Check for messages in the other class that
 * are the same as the base class or are in
 * the base class but missing from the other class */ 
foreach ($base_obj->messages as $k => $v) {
    if (isset($other_obj->messages[$k])) {
        if ($v == $other_obj->messages[$k]) {
            print "SAME: $k\n";
        }
    } else {
        print "MISSING: $k\n";
    }
}

/* Check for messages in the other class but missing
 * from the base class */
foreach ($other_obj->messages as $k => $v) {
    if (! isset($base_obj->messages[$k])) {
        print "MISSING (BASE): $k\n";
    }
}