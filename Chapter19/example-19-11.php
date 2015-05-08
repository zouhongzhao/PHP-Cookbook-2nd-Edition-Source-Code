class pc_MC_Base {
  public $messages;
  public $lang;

  public function msg($s) {
    if (isset($this->messages[$s])) {
      return $this->messages[$s];
    } else {
      error_log("l10n error: LANG: $this->lang, message: '$s'");
    }
  }

}

class pc_MC_es_US extends pc_MC_Base {
   public $lang = 'es_US';
   public $messages = array ('chicken' => 'pollo',
                            'cow'      => 'vaca',
                            'horse'    => 'caballo'
                           );
   
  public function i_am_X_years_old($age) {
    return "Tengo $age años";
  }
}

class pc_MC_en_US extends pc_MC_Base {
    public $lang = 'en_US';
    public $messages = array ('chicken' => 'chicken',
                             'cow'      => 'cow',
                             'horse'    => 'horse'
                             );
   
  public function i_am_X_years_old($age) {
    return "I am $age years old.";
  }
}
?>