<?php
// March 8, 1876
$jd = gregoriantojd(3,9,1876);
// $jd = 2406323

$gregorian = cal_from_jd($jd, CAL_GREGORIAN);
/* $gregorian is an array:
array(9) {
  ["date"]=>
  string(8) "3/9/1876"
  ["month"]=>
  int(3)
  ["day"]=>
  int(9)
  ["year"]=>
  int(1876)
  ["dow"]=>
  int(4)
  ["abbrevdayname"]=>
  string(3) "Thu"
  ["dayname"]=>
  string(8) "Thursday"
  ["abbrevmonth"]=>
  string(3) "Mar"
  ["monthname"]=>
  string(5) "March"
}
*/
?>