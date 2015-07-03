<?php

namespace SandersForPresident\Wordpress\Models;

class EventsModel extends BaseModel {

  var $events = [];

  function __construct() {
    $this->loadEvents();
  }

  function loadEvents() {
    while (have_posts()) {
      the_post();
      $this->events[] = new EventModel(get_the_id());
    }
  }

}
