<?php
$rows = $db->query('SELECT symbol,planet FROM zodiac');
$firstRow = $rows->fetch();
print "The first results are that {$row['symbol']} goes with {$row['planet']}";
?>
