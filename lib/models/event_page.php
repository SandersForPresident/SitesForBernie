<?php

namespace SandersForPresident\Wordpress\Models;

class EventPageModel extends BaseModel {
  public $title;
  public $subtitle;
  public $content;

  public function __construct() {
    $this->title = get_field('event_page_title', 'option');
    $this->subtitle = get_field('event_page_sub_title', 'option');
    $this->content = get_field('event_page_content', 'option');
  }
}
