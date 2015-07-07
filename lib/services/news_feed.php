<?php
namespace SandersForPresident\Wordpress\Services;

class NewsFeedService {
  private $remoteNewsFeedService;
  private $remoteNewsFeed = [];
  private $localNewsFeed = [];

  public function __construct() {
    $this->remoteNewsFeedService = new remoteNewsFeedService();
  }

  public function loadNewsFeed() {
    $this->remoteNewsFeed = $this->remoteNewsFeedService->getFeed();
    $this->localNewsFeed = [];
  }

  public function getNewsFeed() {
    $this->loadNewsFeed();
    return $this->remoteNewsFeed;
    $aggregatedNews = array_merge($this->remoteNewsFeed, $this->localNewsFeed);

    return $aggregatedNews;
  }
}
