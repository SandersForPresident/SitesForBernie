<?php

namespace SandersForPresident\Wordpress\Models\News;

use NewsArticle;

class RemoteNewsArticle extends NewsArticle {
  public $post;

  public function __construct($data) {
    parent::__construct(NewsArticle::REMOTE_TYPE);
    $this->post = data;
  }

  public function getTitle() {
    return $this->post->title;
  }

  public function getContent() {
    return $this->post->description;
  }

  public function getDate() {
    return $this->post->pubDate;
  }

  public function getLink() {
    return $this->post->link;
  }
}
