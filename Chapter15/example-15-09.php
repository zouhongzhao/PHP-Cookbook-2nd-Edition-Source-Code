<?php
class pc_SOAP_return_time {
	public function set_timezone($tz) {
		date_default_timezone_set($tz);
	}

    public function return_time() {
		return date('Ymd\THis'); 
    }
}

$server = new SOAPServer(null, array('uri'=>'urn:pc_SOAP_return_time'));
$server->setClass('pc_SOAP_return_time');

$server->handle();
?>