<?php

namespace SandersForPresident\Wordpress\Models;

class HeaderModel extends BaseModel {
  public $logo;

  public function __construct() {
    $this->logo = get_field('logo', 'options');
  }

  public function getLogo() {
    return $this->logo['sizes']['thumbnail'];
  }
}
