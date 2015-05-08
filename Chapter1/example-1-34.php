<?php
$fp = fopen('fixed-width-records.txt','r') or die ("can't open file");
while ($s = fgets($fp,1024)) {
    $fields[1] = substr($s,0,10);  // first field:  first 10 characters of the line
    $fields[2] = substr($s,10,5);  // second field: next 5 characters of the line
    $fields[3] = substr($s,15,12); // third field:  next 12 characters of the line
    // a function to do something with the fields
    process_fields($fields);
}
fclose($fp) or die("can't close file");
?>