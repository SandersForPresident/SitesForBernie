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
function nav_menus_init () {
  register_nav_menus(array (
    'header' => 'Site Navigation',
    'footer_social' => 'Social Links',
    'footer_organize' => 'Organize Links'
  ));
}
add_action('init', __NAMESPACE__ . '\\nav_menus_init');
