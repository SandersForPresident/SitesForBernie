<?php
namespace SandersForPresident\Wordpress\CustomPosts\Events\Init;

/**
 * Registers the custom post type
 */
function setup() {
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
    'publicly_queryable' => true,
    'can_export' => true,
    'show_in_menu' => true,
    'show_ui' => true,
    'has_archive' => true,
    'hierarchical' => true,
    'show_in_nav_menus' => true,
    'rewrite' => array('slug' => 'events'),
    'supports' => array('title', 'editor', 'revisions', 'thumbnail')
  );
  register_post_type('event', $postType);
}
add_action('init', __NAMESPACE__ . '\\setup');
