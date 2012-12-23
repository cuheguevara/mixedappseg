<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Contoh_rss_feed extends MY_Controller {

  function __construct() {
    parent::__construct();
    $this->load->helper('xml');
    $this->load->helper('text');
    $this->load->model('posts_model','posts');
  }

  function index() {
    $data['feed_name'] = 'citstudio.com'; // your website  
    $data['encoding'] = 'utf-8'; // the encoding  
    $data['feed_url'] = 'http://www.citstudio.com/feed'; // the url to your feed  
    $data['page_description'] = 'Ini adalah Deskripsi'; // some description  
    $data['page_language'] = 'en-en'; // the language  
    $data['creator_email'] = 'citstudio.bdg@gmail.com'; // your email  
    $data['posts'] = $this->posts->getPosts(10);
    header("Content-Type: application/rss+xml"); // important! 
    $this->load->view($this->data['controller'].'/'.$this->data['method'], $data);
  }

}

?>