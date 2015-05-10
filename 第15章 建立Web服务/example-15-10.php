<?php
$opts = array('location' => 'http://api.example.org/getTime', 
              'uri' => 'urn:pc_SOAP_return_time');

$client = new SOAPClient(null, $opts);

$set_timezone = new SOAPVar('Europe/Oslo', XSD_STRING);
$tz = new SOAPHeader('urn:pc_SOAP_return_time', 'set_timezone', $set_timezone);

$result = $client->__soapCall('return_time', array(), array(), array($tz));

print "The local time is $result.\n";
?>