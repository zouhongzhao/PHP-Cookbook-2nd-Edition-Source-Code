<?php
function pc_strftime($tz,$format,$timestamp) {
    putenv("TZ=$tz");
    $a = strftime($format,$timestamp);
    putenv('TZ=EST5EDT');   // change EST5EDT to your server's time zone!
    return $a;
}
?>