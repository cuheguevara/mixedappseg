<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Twitapi extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->con = new Db_handler();
    $this->data['view'] = 'homepages/';
  }

  public function twit() {

    $ch = curl_init("http://api.twitter.com/1/statuses/user_timeline.json?screen_name=EkosuryaID");
    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 5,
            )
    );
    $temp = curl_exec($ch);
    curl_close($ch);
    $results = json_decode($temp, true);

    $this->data['mentionsList'] = $results;
    $this->data['view'] .= 'twitter-api';
    $this->parser->parse('templates/default', $this->data);
  }

  public function index() {
    $oauth_access_token = "0888 0183 0193";
    $oauth_access_token_secret = "0888 0183 0193";
    $consumer_key = "0888 0183 0193";
    $consumer_secret = "0888 0183 0193";
    $url = "https://api.twitter.com/1/statuses/user_timeline.json?include_entities=true&include_rts=true&screen_name=EkosuryaID&count=2";
	//$url = "https://api.twitter.com/1/statuses/282019492345827328/retweeted_by.json";
	//$url = "https://api.twitter.com/1/statuses/show.json?id=282021294780850176&include_entities=true";
	$result = $this->whoMentionMe($url, $consumer_key, $consumer_secret, $oauth_access_token, $oauth_access_token_secret);

    $this->data['mentionsList'] = $result;
    $this->data['view'] .= 'twitter-api';
    $this->parser->parse('templates/default', $this->data);
  }

}