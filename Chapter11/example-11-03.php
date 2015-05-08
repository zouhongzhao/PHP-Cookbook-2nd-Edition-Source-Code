class pc_Shm_Session {
  
  var $shm;
  
  function pc_Shm_Session($tmp = '') {
    if (!function_exists('shmop_open')) {
      trigger_error("pc_Shm_Session: shmop extension is required.",E_USER_ERROR);
      return;
    }
  
    if (! session_set_save_handler(array(&$this, '_open'),
                     array(&$this, '_close'),
                     array(&$this, '_read'),
                     array(&$this, '_write'),
                     array(&$this, '_destroy'),
                     array(&$this, '_gc'))) {
      trigger_error('pc_Shm_Session: session_set_save_handler() failed', E_USER_ERROR);
      return;
    }
    
    $this->shm = new pc_Shm();
        
    return true;
  }
  
  function __construct() {
    return $this->pc_Shm_Session();
  }
  
  function setSize($size) {
    if (ctype_digit($size)) {
      $this->shm->setSize($size);
    }
  }
  
  function _open() {
    return true;
  }
  
  function _close() {
    return true;
  }

  function _read($id) {
    $this->shm->open($id);    
    $data = $this->shm->read();
    $this->shm->close();
    return $data;
  }
  
  function _write($id, $data) {
    $this->shm->open($id);
    $this->shm->write($data);
    $this->shm->close();
    return true;
    
  }
  
  function _destroy($id) {
    $this->shm->open($id);
    $this->shm->delete();
    $this->shm->close();
  }
  
  function _gc($maxlifetime) {
    $d = dir($this->tmp);
    while (false !== ($entry = $d->read())) {
      if (substr($entry, 0, 6) == 'pcshm_') {
        $tmpfile = $this->tmp . DIRECTORY_SEPARATOR . $entry;
        $id = substr($entry, 6);
        $fmtime = filemtime($tmpfile);
        $age = now() - $fmtime;
        if ($age >= $maxlifetime) {
          $this->shm->open($id);
          $this->shm->delete();
          $this->shm->close();
        }
      }
    }
    $d->close();
    return true;
  }

}