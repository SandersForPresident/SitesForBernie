<?php

namespace SandersForPresident\Wordpress\Models\News;

class LocalNewsArticle extends NewsArticle {
  public $post;

  public function __construct ($data) {
    parent::__construct(NewsArticle::LOCAL_TYPE);
    $this->post = $data;
  }

  public function getTitle() {
    return apply_filters('the_title', $this->post->post_title);
  }

  public function getContent() {
    return apply_filters('the_content', $this->post->post_content);
  }

  public function getDate() {
    return null;
  }

  public function getLink() {
    return get_permalink($this->post->ID);
  }
}
