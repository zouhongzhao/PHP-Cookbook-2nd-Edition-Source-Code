<?php
$base = '/usr/local/php-include';
$LANG = 'en_US';

$include_path = ini_get('include_path');
ini_set('include_path',"$base/$LANG:$base/global:$include_path");
?>