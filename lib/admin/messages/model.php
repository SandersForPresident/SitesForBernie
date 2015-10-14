<?php

namespace SandersForPresident\Wordpress\Admin\Messages;

class MessageModel {
  public $id;
  public $title;
  public $body;
  public $read;
  public $date;
  public $from;

  public function __construct($args=array()) {
    foreach ($args as $key=>$val) {
      $this->$key = $val;
    }
  }

  public function getDate() {
    return date('F d, Y h:ia', $this->date);
  }

  public function getBody() {
    return apply_filters('the_content', $this->body);
  }
}
