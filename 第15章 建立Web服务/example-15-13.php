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
	private $authenticated;
	
	public function __construct() {
		$this->authenticated = false;
	}

	public function authenticate_user($args) {
		// Throw SOAP fault for invalid username and password combo
		if (! pc_authenticate_user($args->username, 
								   $args->password)) {
								 
			throw new SOAPFault("Incorrect username and password combination.", 401);
		}								 
	
		$this->authenticated = true;
	}

	// Rest of SOAP Server methods here...
	public function soap_method() {
		if ($this->authenticated) {
			// Method body here...
		} else {
			throw new SOAPFault("Must pass authenticate_user Header.", 401);
		}
	}
	
}

$server = new SOAPServer(null, array('uri'=>'urn:pc_SOAP_return_time'));
$server->setClass('pc_SOAP_return_time');

$server->handle();
?>