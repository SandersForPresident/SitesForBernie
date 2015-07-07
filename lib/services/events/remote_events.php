<?php
namespace SandersForPresident\Wordpress\Services\Events;

class RemoteEventService {
  const FEED_ENDPOINT = 'https://secure.berniesanders.com/page/event/search_results';
  const FEED_CACHE_KEY = 'remote_events';
  const FEED_CACHE_TTL = 900; // 15 minutes

  /**
   * Gets all events
   */
  public function getAllEvents() {
    $events = $this->loadCache();
    if ($events) {
      return $events;
    } else {
      $params = $this->constructListParams();
      $events = $this->makeRequest();
      $this->updateCache($events);
      return $events;
    }
  }

  /**
   * Searches events within an area
   */
  public function searchEvents($zip) {
    $events = $this->loadCache($zip);
    if ($events) {
      return $events;
    } else {
      $params = $this->constructSearchParams($zip);
      $events = $this->makeRequest($params);
      $this->updateCache($events, $zip);
      return $events;
    }
  }

  /**
   * Performs the request for the events
   */
  private function makeRequest($params = array()) {
    $requestUri = FEED_ENDPOINT;
    $requestUri .= http_build_query($params);
    $response = file_get_contents($requestUri);
    return json_decode($response);
  }

  /**
   * Load the cached events, optionally with a grouping by zip
   */
  private function loadCache($group = null) {
    return wp_cache_get(self::FEED_CACHE_KEY, $group);
  }

  /**
   * Update the cache, optionally with a grouping by zip
   */
  private function updateCache($data, $group = null) {
    return wp_cache_set(self::FEED_CACHE_KEY, $events, $group, self::FEED_CACHE_TTL);
  }

  /**
   * Construct the search request params
   */
  private function constructSearchParams($zip) {
    return array(
      'orderby' => 'date',
      'zip_radius' => array($zip, 100),
      'country' => 'US',
      'radius_unit' => 'mi',
      'format' => 'json'
    );
  }

  /**
   * Construct the list request params
   */
  private function constructListParams() {
    return array (
      'orderby' => 'date',
      'format' => 'json'
    );
  }
}
