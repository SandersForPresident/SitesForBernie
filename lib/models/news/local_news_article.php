<?php

namespace SandersForPresident\Wordpress\Models\News;

class LocalNewsArticle extends AbstractNewsArticle {
  public $post;

  public function __construct($data) {
    parent::__construct(AbstractNewsArticle::LOCAL_TYPE);
    $this->post = $data;
  }

  public function getTitle() {
    return apply_filters('the_title', $this->post->post_title);
  }

  public function getContent() {
    return apply_filters('the_content', $this->post->post_content);
  }

  public function getDate() {
      $t = $this->post->post_date_gmt;
      // make sure it looks like a UTC datetime.
      return substr($t,0,10).'T'.substr($t,11).'Z';
  }

  public function getLink() {
    return get_permalink($this->post->ID);
  }
}
