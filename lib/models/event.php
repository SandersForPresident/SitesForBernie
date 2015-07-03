<?php

namespace SandersForPresident\Wordpress\Models;

class EventModel extends PostModel {
  public $location;
  public $date;
  public $time;

  public function __construct($postID = false) {
    parent::__construct($postID);
    $this->location = get_field('location', $this->postID);
    $this->date = get_field('date', $this->postID);
    $this->time = get_field('time', $this->postID);
  }

  public function getDate() {
    return self::formatDate($this->date);
  }

  public function hasTime() {
    return !empty($this->time);
  }

  public function hasLocation() {
    return !empty($this->location);
  }

  public function getLocationCopy() {
    return $this->location['address'];
  }

  public static function formatDate($date) {
    return date('l F j, Y', strtotime($date));
  }
}
