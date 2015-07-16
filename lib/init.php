<?php

namespace SandersForPresident\Wordpress\Init;

/**
 * Theme Setup
 */
function setup() {
  // add any requied setup scripts
}
add_action('after_setup_theme', __NAMESPACE__ . '\\setup');

/**
 * Register Sidebars
 */
function widgets_init() {
  // register any widget areas
}
add_action('widgets_init', __NAMESPACE__ . '\\widgets_init');

/**
 * Registers nav menus
 */
function nav_menus_init() {
  register_nav_menus(array(
    'header' => 'Site Navigation',
    'footer_social' => 'Social Links',
    'footer_organize' => 'Organize Links'
  ));
}
add_action('init', __NAMESPACE__ . '\\nav_menus_init');

function admin_menu_overrides() {
  if (function_exists('acf_set_options_page_menu')) {
    acf_set_options_page_menu('Theme Options');
  }
}
add_action('admin_menu', __NAMESPACE__ . '\\admin_menu_overrides');

// these load specially for acf-option-pages
if (function_exists('acf_add_options_sub_page')) {
  acf_add_options_sub_page(array(
    'title' => 'Event Page Options',
    'parent' => 'edit.php?post_type=event'
  ));

  acf_add_options_sub_page(array(
    'title' => 'Theme Options',
    'menu' => 'Theme Options'
  ));
}

/**
 * ACF Local JSON
 */

// save custom fields
function acf_json_save($path) {
  $path = get_stylesheet_directory() . '/assets/acf_local_json';
  return $path;
}
add_filter('acf/settings/save_json', __NAMESPACE__ . '\\acf_json_save');

// load custom fields
function acf_json_load($paths) {
  unset($paths[0]);
  $paths[] = get_stylesheet_directory() . '/assets/acf_local_json';
  return $paths;
}
add_filter('acf/settings/load_json', __NAMESPACE__ . '\\acf_json_load');
