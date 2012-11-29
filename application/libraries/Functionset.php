<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

/*
 * @author      : Suhendra yohana putra
 * @company     : DBSTUDIO
 * @email       : suhendra@DBstudio.com
 * @URL         : http://DBstudio.com
 * @License     : Totally Free 
 * @Donation    : We are very grateful if you can donate by paypal to yohanamxs@gmail.com, 
 *                  or via bank transfer for the development of this project
 * @doc         : Database Operations
 * @version     : 0.01
 * @Date        : 20 Feb 2012
 * @Engine      : Code Igniter 2.10
 * @Dependency  : CI_Model
 * @Content     : Select, Insert, Update, Delete, getting field value, generating formatted autonumber
 * @use         : 
 *      - Place this file in a libraries folder under application folder's
 *      - load this automatically or manually
 *      - Create new Instance for DBDBase's Class
 *      - Call one function in a class
 * @example     : 
 *      $this->load->library('DBDBase');
 *      $DB = new DBDBase();
 *      $result = $DB->method(param);
 *      echo $result;
 */

class Functionset {

  public function display_content($text = null) {
    // remove stripslash
    $_stripslashes = stripslashes($text);

    // decoding special char
    $_decoding = htmlspecialchars_decode($_stripslashes, ENT_QUOTES);

    // convert div into p
    $_preg_replacing = preg_replace("~<(/)?div>~", "<\\1p>", $_decoding);
    $_preg_replacing = preg_replace("/\\r\\n/", "<br/>", $_preg_replacing);
    $result = preg_replace("~<(/)?strong>~", "<\\1b>", $_preg_replacing);

    // display
    return $result;
  }

  public function display_to_ckeditor($text = null) {
    // remove stripslash
    $_stripslashes = stripslashes($text);

    // decoding special char
    $_decoding = htmlspecialchars_decode($_stripslashes, ENT_QUOTES);

    // convert div into p
    $_preg_replacing = preg_replace("~<(/)?div>~", "<\\1p>", $_decoding);
    $_preg_replacing = preg_replace("/\\r\\n/", "<br/>", $_preg_replacing);
    $result = preg_replace("/<br\W*?\/>/", "", $_preg_replacing);


    // display
    return $result;
  }

}

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
