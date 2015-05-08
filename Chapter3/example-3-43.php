<?php
// 13 Floréal XI
$jd = cal_to_jd(CAL_FRENCH, 8, 13, 11);
// $jd = 2379714

$french = cal_from_jd($jd, CAL_FRENCH);
/* $french is an array:
array(9) {
  ["date"]=>
  string(7) "8/13/11"
  ["month"]=>
  int(8)
  ["day"]=>
  int(13)
  ["year"]=>
  int(11)
  ["dow"]=>
  int(2)
  ["abbrevdayname"]=>
  string(3) "Tue"
  ["dayname"]=>
  string(7) "Tuesday"
  ["abbrevmonth"]=>
  string(7) "Floreal"
  ["monthname"]=>
  string(7) "Floreal"
}
*/

// May 3, 1803 - sale of Louisiana to the US
$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is an array:
array(9) {
  ["date"]=>
  string(8) "5/3/1803"
  ["month"]=>
  int(5)
  ["day"]=>
  int(3)
  ["year"]=>
  int(1803)
  ["dow"]=>
  int(2)
  ["abbrevdayname"]=>
  string(3) "Tue"
  ["dayname"]=>
  string(7) "Tuesday"
  ["abbrevmonth"]=>
  string(3) "May"
  ["monthname"]=>
  string(3) "May"
}
*/
?>