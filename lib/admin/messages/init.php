<?php
namespace SandersForPresident\Wordpress\Admin\Messages\Init;

function register_menus() {
  add_menu_page('Messages', 'Messages', 'manage_options', 'contact_messages', __NAMESPACE__ . '\\render_page', 'dashicons-email');
}
add_action('admin_menu', __NAMESPACE__ . '\\register_menus');

function render_page() {
  if (isset($_REQUEST['post'])) {
    include_once(__DIR__ . '/views/message.php');
  } else {
    include_once(__DIR__ . '/views/messages.php');
  }
}
