<?php
$url = 'http://www.example.com/put.php';
// The request body, in arbitrary format
$body = '<menu>
 <dish type="appetizer">Chicken Soup</dish>
 <dish type="main course">Fried Monkey Brains</dish>
</menu>';
$options = array('method' => 'PUT', 'content' => $body);
// Create the stream context
$context = stream_context_create(array('http' => $options));
// Pass the context to file_get_contents()
print file_get_contents($url, false, $context);
?>