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
 * Registers custom post types
 */
function custom_post_types_init () {
  $postType = array(
    'labels' => array (
      'name' => 'Events',
      'singular_name' => 'Event',
      'edit_item' => 'Edit Event',
      'view_item' => 'View Event',
      'menu_name' => 'Events'
    ),
    'capability_type' => 'post',
    'public' => true,
    'show_ui' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'events'),
    'supports' => array('title', 'editor', 'revisions', 'thumbnail')
  );
  register_post_type('event', $postType);
}
add_action('init', __NAMESPACE__ . '\\custom_post_types_init');


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
