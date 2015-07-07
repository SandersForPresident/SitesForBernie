<?php

namespace SandersForPresident\Wordpress\Models;

use stdClass;

class BaseModel {

  protected function fillModelAttributes(&$attribute, $data) {
    $attribute = new stdClass();
    foreach ($data as $key => $value) {
      $attribute->$key = $value;
    }
  }
}
