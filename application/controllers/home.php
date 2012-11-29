<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->data['view'] = 'homepages/';
  }
  
  public function index() {
    $this->data['view'] .= 'view_home';
    $this->parser->parse( 'templates/default',$this->data);
  }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */