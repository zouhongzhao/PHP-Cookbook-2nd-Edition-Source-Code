<?php
require_once 'HTTP/Request.php';
$opts = array('readTimeout' => array(20,0));
$req = new HTTP_Request('http://slow.example.com/', $opts);
$req->sendRequest();
?>