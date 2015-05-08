<?php
$db = new PDO('mysql:host=db.example.com', $user, $password);
$epoch_1 = time();
$st = $db->prepare("SELECT UNIX_TIMESTAMP(last_login) AS login " .
                   "FROM user WHERE id = ?");
$st->execute(array($id));
$row = $st->fetch();
$epoch_2 = $row['login'];

$diff_seconds  = $epoch_1 - $epoch_2;
$diff_weeks    = floor($diff_seconds/604800);
$diff_seconds -= $diff_weeks   * 604800;
$diff_days     = floor($diff_seconds/86400);
$diff_seconds -= $diff_days    * 86400;
$diff_hours    = floor($diff_seconds/3600);
$diff_seconds -= $diff_hours   * 3600;
$diff_minutes  = floor($diff_seconds/60);
$diff_seconds -= $diff_minutes * 60;

print "You last logged in $diff_weeks weeks, $diff_days days, ";
print "$diff_hours hours, $diff_minutes minutes, and $diff_seconds ago.";