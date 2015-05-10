<?php
$opts = array('location' => 'http://api.example.org/getTime', 
              'uri' => 'urn:pc_SOAP_return_time');

$client = new SOAPClient(null, $opts);

$result = $client->__soapCall('return_time', array());

print "The local time is $result.\n";
?>