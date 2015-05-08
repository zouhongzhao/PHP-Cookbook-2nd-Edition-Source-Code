<?php
class pc_SOAP_return_time {
    public function return_time($tz = '') {
		// set the time zone based on the input
        if ($tz) { $my_tz = date_default_timezone_set($tz); }
		// get the new timestamp
		$date = date('Ymd\THis'); 
		// reset the time zone to default
        if ($tz) { date_default_timezone_set(ini_get('date.timezone')); }
		// return the timestamp
        return $date;
    }
}

$server = new SOAPServer(null,array('uri'=>'urn:pc_SOAP_return_time'));
$server->setClass('pc_SOAP_return_time');
$server->handle();
?>