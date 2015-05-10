<?php
class pc_SOAP_return_time {
    public function return_time() {
    	$tz = date_default_timezone_get();
		$header = new SoapHeader('urn:pc_SOAP_return_time', 'get_timezone', $tz)
    	$GLOBALS['server']->addSoapHeader($header);
	
		return date('Ymd\THis'); 
    }
}

$server = new SOAPServer(null, array('uri'=>'urn:pc_SOAP_return_time'));
$server->setClass('pc_SOAP_return_time');

$server->handle();
?>