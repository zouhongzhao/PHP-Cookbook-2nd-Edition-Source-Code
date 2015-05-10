<?php
// Add more action specific logic inside switch()
switch ($_GET['action']) {
case 'search':
	$action = 'search';
	break;	
case 'add':
	$action = 'add';
	break;	
case 'update':
	$action = 'update';
	break;	
case 'delete':
	$action = 'delete';
	break;	
default:
	// invalid action
	exit();
}

// Music Database XML document moved to file
$s = simplexml_load_string('music_database.xml');

if ($action == 'search') {
	$artist = $_GET['artist'];
	$query = "/music/album[artist = '$artist']";
	$albums = $s->xpath($query);

	// Display results here
} elseif ($action == 'add') {
	$artist = $_GET['artist'];
	$album = $_GET['album'];
	
	// Insert new node from input data
}

// ... other actions here
?>