<?php
// 14 Adar 5761
$jd = cal_to_jd(CAL_JEWISH, 6, 14, 5761);
// $jd = 2451978

$jewish = cal_from_jd($jd, CAL_JEWISH);
/* $jewish is an array:
array(9) {
  ["date"]=>
  string(9) "6/14/5761"
  ["month"]=>
  int(6)
  ["day"]=>
  int(14)
  ["year"]=>
  int(5761)
  ["dow"]=>
  int(5)
  ["abbrevdayname"]=>
  string(3) "Fri"
  ["dayname"]=>
  string(6) "Friday"
  ["abbrevmonth"]=>
  string(5) "AdarI"
  ["monthname"]=>
  string(5) "AdarI"
}
*/

$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is an array:
array(9) {
  ["date"]=>
  string(8) "3/9/2001"
  ["month"]=>
  int(3)
  ["day"]=>
  int(9)
  ["year"]=>
  int(2001)
  ["dow"]=>
  int(5)
  ["abbrevdayname"]=>
  string(3) "Fri"
  ["dayname"]=>
  string(6) "Friday"
  ["abbrevmonth"]=>
  string(3) "Mar"
  ["monthname"]=>
  string(5) "March"
}
*/
?>