<?php
namespace SandersForPresident\Wordpress\Services\Events;

class RemoteEventService {
  const FEED_ENDPOINT = 'https://secure.berniesanders.com/page/event/search_results';

  public function getAllEvents() {
    $params = $this->constructListParams();
    return $this->makeRequest();
  }

  public function searchEvents($zip) {
    $params = $this->constructSearchParams($zip);
    return $this->makeRequest($params);
  }

  private function makeRequest($params = array()) {
    $requestUri = FEED_ENDPOINT;
    $requestUri .= http_build_query($params);
    $response = file_get_contents($requestUri);
    return json_decode($response);
  }

  private function constructSearchParams($zip) {
    return array(
      'orderby' => 'date',
      'zip_radius' => array($zip, 100),
      'country' => 'US',
      'radius_unit' => 'mi',
      'format' => 'json'
    );
  }

  private function constructListParams() {
    return array (
      'orderby' => 'date',
      'format' => 'json'
    );
  }
}
