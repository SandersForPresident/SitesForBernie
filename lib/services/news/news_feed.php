<?php
namespace SandersForPresident\Wordpress\Services\News;

use SandersForPresident\Wordpress\Models\News\LocalNewsArticle;

class NewsFeedService {
  private $remoteNewsFeedService;

  public function __construct() {
    $this->remoteNewsFeedService = new RemoteNewsFeedService();
  }

  /**
   * Fetches the local news feed.
   * Note: currently MUST utilize The Loop
   */
  public function getLocalNewsFeed() {
    global $post;
    $articles = array();
    while (have_posts()) {
      the_post();
      $articles[] = new LocalNewsArticle($post);
    }
    return $articles;
  }

  /**
   * Merges the remote and local news feed articles into a chronological series
   */
  public function getNewsFeed() {
    $remoteNewsFeed = $this->remoteNewsFeedService->getFeed();
    $localNewsFeed = $this->getLocalNewsFeed();
    $aggregatedNews = array_merge($remoteNewsFeed, $localNewsFeed);
    usort($aggregatedNews, array(__CLASS__, 'aggregateNewsSort'));
    return $aggregatedNews;
  }

  /**
   * Date comparison for a descending feed
   */
  private static function aggregateNewsSort($a, $b) {
    return strtotime($a->getDate()) < strtotime($b->getDate());
  }
}
