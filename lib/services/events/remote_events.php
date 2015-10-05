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
      $events = $this->makeRequest($params, true);
      $this->updateCache($events);
      return $events;
    }
  }

  /**
   * Searches events within an area
   */
  public function searchEvents($state) {
    $events = $this->loadCache($state);
    if ($events) {
      return $events;
    } else {
      $params = $this->constructSearchParams($state);
      $events = $this->makeRequest($params);
      $this->updateCache($events, $state);
      return $events;
    }
  }

  public function getLocalEvents() {
    $state = get_field('site_state_abbreviation', 'option');
    return $this->searchEvents($state);
  }

  /**
   * Performs the request for the events
   */
  private function makeRequest($params = array(), $count_only = false) {
    $requestUri = self::FEED_ENDPOINT;
    $requestUri .= '?' . http_build_query($params);
    if ($count_only){
      // still waits for entire HTTP request, but chops off output
      // so we don't have to parse through ALL that JSON just to get the count
      // read the first 115 characters then patch it up.
      $response = file_get_contents($requestUri, false, null, -1, 115);
      $response = preg_replace('/\}\,.*/', '}}', $response);
    } else {
      $response = file_get_contents($requestUri);
    }
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
  private function constructSearchParams($state) {
    return array(
      'state' => $state,
      'orderby' => 'date',
      'country' => 'US',
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
