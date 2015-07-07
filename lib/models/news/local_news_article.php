<?php

namespace SandersForPresident\Wordpress\Models\News;

use NewsArticle;

class LocalNewsArticle extends NewsArticle {
  public $post;

  public function __construct ($data) {
    parent::__construct(NewsArticle::LOCAL_TYPE);
    $this->post = $data;
  }

  public function getTitle() {
    return apply_filter('the_title', $this->post->title);
  }

  public function getContent() {
    return apply_filter('the_content', $this->post->content);
  }

  public function getDate() {
    return null;
  }

  public function getLink() {
    return get_permalink($this->post->ID);
  }

  public function
}
