<?php
$wsdl_url = 
    'http://services.xmethods.net/soap/urn:xmethods-delayed-quotes.wsdl';

$client = new SOAPClient($wsdl_url);

$quote = $client->getQuote('EBAY'); // eBay, Inc.
print $quote;
?>
