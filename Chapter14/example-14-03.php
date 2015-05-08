<?php
$wsdl_url = 
    'http://www.example.com/TemperatureService.wsdl';

// Disable exceptions
$opts = array('exceptions' => 0);
$client = new SOAPClient($wsdl_url, $opts);

$temp = $client->&gt;getTemp('New York'); // This should be a Zip Code
if (is_soap_fault($temp)) {
    print $exception;
} else {
    print $temp;
}
?>


