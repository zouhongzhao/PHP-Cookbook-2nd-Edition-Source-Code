<?php
// Add more action specific logic inside switch()

// Convert to UPPER CASE
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);

switch ($request_method) {
case 'GET':
	$action = 'search';
	break;	
case 'POST':
	$action = 'add';
	break;	
case 'PUT':
	$action = 'update';
	break;	
case 'DELETE':
	$action = 'delete';
	break;	
default:
	// invalid action
	exit();
}

// ... other actions here
?>