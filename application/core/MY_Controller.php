<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

  public $error = array();
  public $data = array();
  public $template = 'templates/default.php';

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
    
    $this->con = new Db_handler();
    $this->data['menu_list'] = $this->con->DB_SELECT('mx_menu', 'equal', array('lang'=>$this->language_id));
    
    $this->data['controller'] = $this->router->fetch_class();
    $this->data['method'] = $this->router->fetch_method();
  }
  
  protected function render($data = null, $view = null, $partial = null) {
    $data['controller'] = $this->data['controller'];
    $data['method'] = $this->data['method'];

    if ($partial != null) {
      foreach ($partial as $key => $part) {
        $data[$key] = $this->load->view($part, $data, true);
      }
    }
    
    if ($this->input->is_ajax_request()) $this->template = 'ajax';
    
    $url = $this->data['controller'] . '/' . $this->data['method'];
    if ($view != null) {
      $views = explode('/', $view);
      if (sizeof($views) == 2) {
        $url = $views[0] . '/' . $views[1];
      } else {
        $url = $this->data['controller'] . '/' . $view;
      }
    }
    //render view
    $data['view'] = $this->load->view($url, $data, true);
    //render template
    $this->load->view($this->template, $data);
  }

  function twittercRUL($url = "http://www.citstudio.com", $ck="consumer_key", $cks="consumer_key_secret", $oat = "oauth_access_token", $oats = "oauth_access_token_secret") {
    $oauth = array('oauth_consumer_key' => $ck,
        'oauth_nonce' => time(),
        'oauth_signature_method' => 'HMAC-SHA1',
        'oauth_token' => $oat,
        'oauth_timestamp' => time(),
        'oauth_version' => '1.0');

    $base_info = $this->buildBaseString($url, 'GET', $oauth);
    $composite_key = rawurlencode($cks) . '&' . rawurlencode($oats);
    $oauth_signature = base64_encode(hash_hmac('sha1', $base_info, $composite_key, true));
    $oauth['oauth_signature'] = $oauth_signature;
    $header = array($this->buildAuthorizationHeader($oauth), 'Expect:');

    $ch = curl_init($url);
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_BUFFERSIZE => 10,
        CURLOPT_HTTPHEADER => $header,
        CURLOPT_HEADER => false,
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_SSL_VERIFYPEER => false
            )
    );
    $temp = curl_exec($ch);
    curl_close($ch);
    $results = json_decode($temp, true);
    return $results;
  }

  function buildBaseString($baseURI, $method, $params) {
    $r = array();
    ksort($params);
    foreach ($params as $key => $value) {
      $r[] = "$key=" . rawurlencode($value);
    }
    return $method . "&" . rawurlencode($baseURI) . '&' . rawurlencode(implode('&', $r));
  }

  function buildAuthorizationHeader($oauth) {
    $r = 'Authorization: OAuth ';
    $values = array();
    foreach ($oauth as $key => $value)
      $values[] = "$key=\"" . rawurlencode($value) . "\"";
    $r .= implode(', ', $values);
    return $r;
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

  function getAPIData($url) {
    $this->load->library('filecontents');
    $movie_now = new Filecontents();
    return $movie_now->_getContent("https://api.twitter.com/1.1/statuses/mentions_timeline.json");
  }

}
