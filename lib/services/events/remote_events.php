<?php
namespace SandersForPresident\Wordpress\Services\Events;

class RemoteEventService {
  const FEED_ENDPOINT = 'https://secure.berniesanders.com/page/event/search_results';
  const QUERY_PARAM_ORDERBY = 'orderby';
  const QUERY_PARAM_ZIP_RADIUS = 'zip_radius';
  const QUERY_PARAM_COUNTRY = 'country';
  const QUERY_PARAM_COUNTRY_US = 'US';
  const QUERY_PARAM_RADIUS_UNIT = 'radius_unit';
  const QUERY_PARAM_RADIUS_UNIT_MI = 'mi';
  const QUERY_PARAM_DATE = 'date';
  const QUERY_PARAM_FORMAT = 'format';
  const QUERY_PARAM_FORMAT_JSON = 'json';
  const QUERY_PARAM_ZIP_MAX_RADIUS = 100;

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
    $params = array();
    $params[QUERY_PARAM_ORDERBY] = QUERY_PARAM_DATE;
    $params[QUERY_PARAM_ZIP_RADIUS] = array(
      $zip,
      QUERY_PARAM_ZIP_MAX_RADIUS
    );
    $params[QUERY_PARAM_COUNTRY] = QUERY_PARAM_COUNTRY_US;
    $params[QUERY_PARAM_RADIUS_UNIT] = QUERY_PARAM_RADIUS_UNIT_MI;
    $params[QUERY_PARAM_FORMAT] = QUERY_PARAM_FORMAT_JSON;
  }

  private function constructListParams() {
    $params = array();
    $params[QUERY_PARAM_ORDERBY] = QUERY_PARAM_ZIP_RADIUS;
    $params[QUERY_PARAM_FORMAT] = QUERY_PARAM_FORMAT_JSON;
  }
}

class RemoteEventServiceResponse {
  private $data;
}
