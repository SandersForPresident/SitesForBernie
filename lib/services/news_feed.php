<?php
namespace SandersForPresident\Wordpress\Services;

use SandersForPresident\Wordpress\Models\News\LocalNewsArticle;

class NewsFeedService {
  private $remoteNewsFeedService;
  private $remoteNewsFeed = [];
  private $localNewsFeed = [];

  public function __construct() {
    $this->remoteNewsFeedService = new remoteNewsFeedService();
  }

  public function loadNewsFeed() {
    $this->remoteNewsFeed = $this->remoteNewsFeedService->getFeed();
    $this->localNewsFeed = $this->getLocalNewsFeed();
  }

  private function getLocalNewsFeed() {
    global $post;
    $articles = [];
    while (have_posts()) {
      the_post();
      $articles[] = new LocalNewsArticle($post);
    }
    return $articles;
  }

  public function getNewsFeed() {
    $this->loadNewsFeed();
    $aggregatedNews = array_merge($this->remoteNewsFeed, $this->localNewsFeed);

    return $aggregatedNews;
  }
}
