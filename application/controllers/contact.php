<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->data['view'] = 'homepages/';
    $this->data['name'] = '';
      $this->data['email'] = '';
      $this->data['pesan'] = '';
      $this->data['msg'] = '';
  }
  
  public function index() {
    $this->data['captcha'] = $this->_make_captcha();
    $this->data['view'] .= 'contact';
    $this->parser->parse( 'templates/default',$this->data);
  }
  
  public function send()
  {
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
      $data = $this->input->post("input");
      $this->data['name'] = $data['name'];
      $this->data['email'] = $data['email'];
      $this->data['pesan'] = $data['pesan'];
      
      $this->data['captcha'] = $this->_make_captcha();
      $this->data['view'] .= 'contact';
      
      if ($this->_check_capthca()) {
        $this->data['msg'] = "TERIMA KASIH";
      } else {
        $this->data['msg'] = "CAPTHCA SALAH INPUT";
      }
    } else {
      $this->data['captcha'] = $this->_make_captcha();
      $this->data['view'] .= 'contact';
      
    }
      $this->parser->parse('templates/default', $this->data);
  }

}