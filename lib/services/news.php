<?php
namespace SandersForPresident\Wordpress\Services;
use simplexml_load_file;

class News {
  const FEED_ENDPOINT = 'https://berniesanders.com/feed/';
  const FEED_CACHE_KEY = 'bernie_news_feed';
  const FEED_CACHE_TTL = 900; // 15 minute cache

  private $feed;

  /**
   * Loads the remote RSS feed
   */
  private function loadFeed() {
    $this->feed = simplexml_load_file(FEED_ENDPOINT, 'SimpleXMLElement', LIBXML_NOWARNING);
  }

  /**
   * Parses the XML feed into JSON
   */
  private function parseFeed($xml) {
    $json = json_encode($xml);
    $json = json_decode($json, true);
    $feed = $json['channel']['items'];
    return $feed;
  }

  /**
   * Load the cached feed
   */
  private function loadCache() {
    return wp_cache_get(FEED_CACHE_KEY);
  }

  /**
   * Update the cache with the latest feed
   */
  private function updateCache($feed) {
    return wp_cache_set(FEED_CACHE_KEY, $feed, null, FEED_CACHE_TTL);
  }

  /**
   * Get the news feed, cache lookup first
   */
  public function getFeed() {
    if ($feed = $this->loadCache()) {
      return $feed;
    } else {
      $xml = $this->loadFeed();
      if (!$xml) {
        // likely a problem fetching content
        return [];
      }
      $feed = $this->parseFeed($xml);
      $this->updateCache($feed);
      return $feed;
    }
  }
}
