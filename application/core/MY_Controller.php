<?php if (!defined('BASEPATH')) exit('No direct script access allowed'); 

class MY_Controller extends CI_Controller {

  public $error = array();
  public $data = array();

  public function __construct() {
    parent::__construct();

//    Language Switcher, 
//    load from /application/controller/change/<language>
//    called from link language
    $this->language = $this->session->userdata('language');
    $this->language = (isset($this->language) ? $this->language : 'english');
    $this->language_id = $this->language == "indonesia" ? "id" : "en";
    $this->lang->load('site', $this->language);
    $this->data['PAGE_TITLE'] = 'Welcome in Mixed Script';
  }

 function _make_captcha() {
    $this->load->helper('captcha');
    $vals = array(
        'img_path' => './assets/images/captcha/', // PATH for captcha ( *Must mkdir (htdocs)/captcha )
        'img_url' => base_url() . 'assets/images/captcha/', // URL for captcha img
        'img_width' => 200, // width
        'img_height' => 40, // height
        'font_path' => './assets/fontface/appleberry_with_cyrillic.ttf',
        'font_size' => 20,
        'expiration' => 7200,
        'word_length' => 5,
    );
    // Create captcha
    $cap = create_captcha($vals);
    // Write to DB
    if ($cap) {
      $data = array(
          'captcha_id' => '',
          'captcha_time' => $cap['time'],
          'ip_address' => $this->input->ip_address(),
          'word' => $cap['word'],
      );
      $query = $this->db->insert_string('ct_captcha', $data);
      $this->db->query($query);
    } else {
      return "Umm captcha not work";
    }
    return $cap['image'];
  }

  function _check_capthca() {
    // Delete old data ( 2hours)
    $expiration = time() - 7200;
    $sql = " DELETE FROM ct_captcha WHERE captcha_time < ? ";
    $binds = array($expiration);
    $query = $this->db->query($sql, $binds);

    //checking input
    $sql = "SELECT COUNT(*) AS count FROM ct_captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
    $binds = array($_POST['captcha'], $this->input->ip_address(), $expiration);
    $query = $this->db->query($sql, $binds);
    $row = $query->row();

    if ($row->count > 0) {
      return true;
    }
    return false;
  }
}
