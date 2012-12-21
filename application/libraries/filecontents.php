<?php

class Filecontents {
  
  public function _getContent ($data=null)
  {
    return json_decode(file_get_contents($data),TRUE);
  }

}
?>
