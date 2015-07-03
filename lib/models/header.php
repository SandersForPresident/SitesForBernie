<?php

namespace SandersForPresident\Wordpress\Models;

class HeaderModel extends BaseModel {
  var $logo;

  function __construct() {
    $this->logo = get_field('logo', 'options');
  }

  function getLogo() {
    return $this->logo['sizes']['thumbnail'];
  }
}
