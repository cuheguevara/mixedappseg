<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contoh_captha_recaptcha extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->con = new Db_handler();
    $this->data['view'] = $this->data['controller'].'/';
    $this->data['name'] = '';
    $this->data['email'] = '';
    $this->data['pesan'] = '';
    $this->data['msg'] = '';
    $this->data['MX_BREADCUMB'] = 'CAPTCHA RECAPTCHA';
  }

  public function index() {
    $publickey = "6Le1odkSAAAAAOkOoQShIa1Z4sqGufXeAworDZhQ";
    $error = null;
    $this->load->helper('recaptchalib');
    $this->data['captcha'] = recaptcha_get_html($publickey, $error);
    $this->data['view'] .= $this->data['method'];
    $this->parser->parse('templates/default', $this->data);
  }

  public function send() {
    $this->load->helper('recaptchalib');
    $privatekey = "6Le1odkSAAAAAJ54KDixkpF3rNrclAl77IqOdzDs";
    $data = $this->input->post("input");
    $captcha = $this->input->post("recaptcha_response_field");
    $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
    $error = null;

    $this->data['view'] .= 'index';
    if ($resp->is_valid) {
      $this->data['name'] = $data['name'];
      $this->data['email'] = $data['email'];
      $this->data['pesan'] = $data['pesan'];
      $this->con->DB_INSERT('ct_guestbook', array('name' => $data['name'], 'email' => $data['email'], 'msg' => $data['pesan']));
      $this->data['msg'] = "TERIMA KASIH";
    } else {
      $this->data['msg'] = "CAPTHCA SALAH INPUT";
      $error = $resp->error;
    }
    $publickey = "6Le1odkSAAAAAOkOoQShIa1Z4sqGufXeAworDZhQ";
    $this->data['captcha'] = recaptcha_get_html($publickey, $error);
    $this->parser->parse('templates/default', $this->data);
  }

  
}