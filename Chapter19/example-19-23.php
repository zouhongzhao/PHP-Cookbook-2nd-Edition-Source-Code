<?php
// $locale comes from headers or virtual host name
$classname = "pc_MC_$locale";

require_once 'pc_MC_Base.php';
require_once $classname.'.php';

$MC = new $classname;
?>