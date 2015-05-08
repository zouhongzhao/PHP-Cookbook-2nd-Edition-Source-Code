<?php
// Your authentication logic
// Which is probably decoupled from your SOAP Server
function pc_authenticate_user($username, password) {
	// authenticate user
	$is_valid = true; // Implement your lookup here

	if ($is_valid) {
		return true;
	} else {
		return false;
	}
}


class pc_SOAP_return_time {
	public function __construct() {
		// Throw SOAP fault for invalid username and password combo
		if (! pc_authenticate_user($_SERVER['PHP_AUTH_USER'], 
								   $_SERVER['PHP_AUTH_PW'])) {
								 
			throw new SOAPFault("Incorrect username and password combination.", 401);
		}								 
	}

	// Rest of SOAP Server methods here...
}

$server = new SOAPServer(null, array('uri'=>'urn:pc_SOAP_return_time'));
$server->setClass('pc_SOAP_return_time');

$server->handle();
?>