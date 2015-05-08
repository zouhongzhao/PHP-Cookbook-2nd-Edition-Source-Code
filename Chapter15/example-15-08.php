<?php
class pc_SOAP_return_time {
    public function return_time() {
		$date = date('Ymd\THis');
		if ($date === false) {
			throw new SOAPFault(1, 'Bad dates.');
		}
        return $date;
    }
}

$server = new SOAPServer(null, array('uri'=>'urn:pc_SOAP_return_time'));
$server->setClass('pc_SOAP_return_time');

$server->handle();
}
?>