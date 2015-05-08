<?php
// February 29, 1900 (not a Gregorian leap year)
$jd = cal_to_jd(CAL_JULIAN, 2, 29, 1900);
// $jd = 2415092

$julian = cal_from_jd($jd, CAL_JULIAN);
/* $julian is an array:
array(9) {
  ["date"]=>
  string(9) "2/29/1900"
  ["month"]=>
  int(2)
  ["day"]=>
  int(29)
  ["year"]=>
  int(1900)
  ["dow"]=>
  int(2)
  ["abbrevdayname"]=>
  string(3) "Tue"
  ["dayname"]=>
  string(7) "Tuesday"
  ["abbrevmonth"]=>
  string(3) "Feb"
  ["monthname"]=>
  string(8) "February"
}
*/

$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is an array:
array(9) {
  ["date"]=>
  string(9) "3/13/1900"
  ["month"]=>
  int(3)
  ["day"]=>
  int(13)
  ["year"]=>
  int(1900)
  ["dow"]=>
  int(2)
  ["abbrevdayname"]=>
  string(3) "Tue"
  ["dayname"]=>
  string(7) "Tuesday"
  ["abbrevmonth"]=>
  string(3) "Mar"
  ["monthname"]=>
  string(5) "March"
}
*/
?>