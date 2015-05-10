class Person {
	// list person and email as valid properties
    protected $data = array('person', 'email');

    public function __get($property) {
        if (isset($this->data[$property])) {
            return $this->data[$property];
        } else {
            return false;
        }
    }

	// enforce the restriction of only setting 
	// pre-defined properties
    public function __set($property, $value) {
        if (isset($this->data[$property])) {
	        return $this->data[$property] = $value;
        } else {
            return false;
        }
    }

	public function __isset($property) {
        if (isset($this->data[$property])) {
            return true;
        } else {
            return false;
	}

    public function __unset($property) {
        if (isset($this->data[$property])) {
            return unset($this->data[$property]);
        } else {
            return false;
        }
    }
}