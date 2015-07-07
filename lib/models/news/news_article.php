<?php

namespace SandersForPresident\Wordpress\Models\News;

class NewsArticle {
  const LOCAL_TYPE = 0;
  const REMOTE_TYPE = 1;

  private $type;

  public function __construct($type) {
    $this->type = type;
  }

  abstract public function getTitle();
  abstract public function getContent();
  abstract public function getDate();
  abstract public function getLink();

  public function getFormattedDate() {
    return date('l F j, Y', strtotime($this->getDate()));
  }

  public function getType() {
    return $this->type;
  }

  public function isLocal() {
    return self::LOCAL_TYPE === $this->type;
  }

  public function isRemote() {
    return self::REMOTE_TYPE === $this->type;
  }

}
