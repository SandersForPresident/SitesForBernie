<?php
namespace SandersForPresident\Wordpress\Services;
use simplexml_load_file;

class NewsFeedService {
  const FEED_ENDPOINT = 'https://berniesanders.com/feed/';
  const FEED_CACHE_KEY = 'bernie_news_feed';
  const FEED_CACHE_TTL = 900; // 15 minute cache

  /**
   * Loads the remote RSS feed
   */
  private function loadFeed() {
    return simplexml_load_file(self::FEED_ENDPOINT, 'SimpleXMLElement', LIBXML_NOWARNING);
  }

  /**
   * Parses the XML feed into JSON
   */
  private function parseFeed($xml) {
    $json = json_encode($xml);
    $json = json_decode($json, true);
    $feed = $json['channel']['item'];
    return $feed;
  }

  /**
   * Load the cached feed
   */
  private function loadCache() {
    return wp_cache_get(self::FEED_CACHE_KEY);
  }

  /**
   * Update the cache with the latest feed
   */
  private function updateCache($feed) {
    return wp_cache_set(self::FEED_CACHE_KEY, $feed, null, self::FEED_CACHE_TTL);
  }

  /**
   * Get the news feed, cache lookup first
   */
  public function getFeed() {
    if ($feed = $this->loadCache()) {
      echo 'YUP';
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
