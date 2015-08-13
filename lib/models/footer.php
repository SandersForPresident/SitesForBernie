<?php

namespace SandersForPresident\Wordpress\Models;

class FooterModel extends BaseModel {
  const LEFT_NAVIGATION_SLUG = 'footer_social';

  public $leftNavigation;

  public function __construct() {
    $this->navLocations = get_nav_menu_locations();
    $this->prepareLeftNavigation();
  }

  public function hasLeftNavigation() {
    return !empty($this->leftNavigation);
  }

  public function prepareLeftNavigation() {
    if (!array_key_exists(self::LEFT_NAVIGATION_SLUG, $this->navLocations)) {
      return;
    }
    $menu = wp_get_nav_menu_object($this->navLocations[self::LEFT_NAVIGATION_SLUG]);
    $menuItems = wp_get_nav_menu_items($menu->term_id);
    $this->fillModelAttributes($this->leftNavigation, array(
      'title' => $menu->name,
      'items' => $menuItems
    ));
  }
}
