<?php

namespace SandersForPresident\Wordpress\Config;

function assets() {
  wp_enqueue_style('sanders_css', get_template_directory_uri() . '/assets/dist/main.css');
  wp_enqueue_script('sanders_vendor_js', get_template_directory_uri() . '/assets/dist/vendor.js', [], null, true);
  wp_enqueue_script('sanders_js', get_template_directory_uri() . '/assets/dist/main.js', ['sanders_vendor_js'], null, true);
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\assets', 100);
