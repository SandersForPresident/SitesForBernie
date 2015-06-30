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
