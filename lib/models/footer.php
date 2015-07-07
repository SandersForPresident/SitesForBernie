<?php

namespace SandersForPresident\Wordpress\Models;

class FooterModel extends BaseModel {
  const LEFT_NAVIGATION_SLUG = 'footer_social';
  const RIGHT_NAVIGATION_SLUG = 'footer_organize';

  public $leftNavigation;
  public $rightNavigation;

  public function __construct() {
    $this->navLocations = get_nav_menu_locations();
    $this->prepareLeftNavigation();
    $this->prepareRightNavigation();
  }

  public function prepareLeftNavigation() {
    $menu = wp_get_nav_menu_object($this->navLocations['footer_social']);
    $menuItems = wp_get_nav_menu_items($menu->term_id);
    $this->fillModelAttributes($this->leftNavigation, array(
      'title' => $menu->name,
      'items' => $menuItems
    ));
  }

  public function prepareRightNavigation() {
    $menu = wp_get_nav_menu_object($this->navLocations['footer_organize']);
    $menuItems = wp_get_nav_menu_items($menu->term_id);
    $this->fillModelAttributes($this->rightNavigation, array(
      'title' => $menu->name,
      'items' => $menuItems
    ));
  }
}
