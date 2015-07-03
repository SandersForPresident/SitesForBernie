<?php

namespace SandersForPresident\Wordpress\Models;

class EventsModel extends BaseModel {
  public $events = [];

  public function __construct() {
    $this->loadEvents();
  }

  public function loadEvents() {
    while (have_posts()) {
      the_post();
      $this->events[] = new EventModel(get_the_id());
    }
  }
}
