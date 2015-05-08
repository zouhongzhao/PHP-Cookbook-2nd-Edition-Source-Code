<?php
$stamp_future = gmmktime(15,25,0,6,4,2012);

print $stamp_future;
print strftime('%c',$stamp_future);
