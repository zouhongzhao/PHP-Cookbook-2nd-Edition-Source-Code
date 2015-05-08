<?php
require_once 'Services/JSON.php';
$menu = array();
$menu[] = array('type' => 'appetizer',
                'dish' => 'Chicken Soup');
$menu[] = array('type' => 'main course',
                'dish' => 'Fried Monkey Brains');
header('Content-Type: application/json');
$json = new Services_JSON();
print $json->encode($menu);
?>