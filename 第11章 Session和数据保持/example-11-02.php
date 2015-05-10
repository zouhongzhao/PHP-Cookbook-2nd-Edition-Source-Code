class pc_Shm {

  var $tmp;
  var $size;
  var $shm;
  var $keyfile;

  function pc_Shm($tmp = '') {
    if (!function_exists('shmop_open')) {
      trigger_error('pc_Shm: shmop extension is required.', E_USER_ERROR);
      return;
    }

    if ($tmp != '' && is_dir($tmp) && is_writable($tmp)) {
      $this->tmp = $tmp;
    } else {
      $this->tmp = '/tmp';
    }
    
    // default to 16k
    $this->size = 16384;

    return true;
  }

  function __construct($tmp = '') {
    return $this->pc_Shm($tmp);
  }

  function setSize($size) {
    if (ctype_digit($size)) {
      $this->size = $size;
    }
  }
  
  function open($id) {
    $key = $this->_getKey($id);
    $shm = shmop_open($key, 'c', 0644, $this->size);
    if (!$shm) {
      trigger_error('pc_Shm: could not create shared memory segment', E_USER_ERROR);
      return false;
    }
    $this->shm = $shm;
    return true;
  }
  
  function write($data) {
    $written = shmop_write($this->shm, $data, 0);
    if ($written != strlen($data)) {
      trigger_error('pc_Shm: could not write entire length of data', E_USER_ERROR);
      return false;
    }
    return true;
  }
  
  function read() {
    $data = shmop_read($this->shm, 0, $this->size);
    if (!$data) {
      trigger_error('pc_Shm: could not read from shared memory block', E_USER_ERROR);
      return false;
    }
    return $data;
  }
  
  function delete() {
    if (shmop_delete($this->shm)) {
      if (file_exists($this->tmp . DIRECTORY_SEPARATOR . $this->keyfile)) {
        unlink($this->tmp . DIRECTORY_SEPARATOR . $this->keyfile);
      }
    }
    return true;
  }
  
  function close() {
    return shmop_close($this->shm);
  }

  function fetch($id) {
    $this->open($id);
    $data = $this->read();
    $this->close();
    return $data;
  }
  
  function save($id, $data) {
    $this->open($id);
    $result = $this->write($data);
    if (! (bool) $result) {
      return false;                
    } else {
      $this->close();
      return $result;
    }    
  }   
  
  function _getKey($id) {
    $this->keyfile = 'pcshm_' . $id;
    if (!file_exists($this->tmp . DIRECTORY_SEPARATOR . $this->keyfile)) {
      touch($this->tmp . DIRECTORY_SEPARATOR . $this->keyfile);
    }
    return ftok($this->tmp . DIRECTORY_SEPARATOR . $this->keyfile, 'R');
  }
}