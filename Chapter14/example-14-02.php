<?php
try {
    $wsdl_url = 
        'http://www.example.com/TemperatureService.wsdl';

    $client = new SOAPClient($wsdl_url);

    $temp = $client->getTemp('New York'); // This should be a zip code
    print $temp;
} catch (SOAPFault $exception) {
    print $exception;
}
?>




