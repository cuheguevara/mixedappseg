<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Language extends CI_Controller {

  function __construct() 
  {
    parent::__construct();
  }
  function change() 
  {
    $lang = $this->uri->segment(2);
    $this->session->set_userdata(array('language'=>$lang));
    redirect(base_url());
  }

}
