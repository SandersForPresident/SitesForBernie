<?php

namespace SandersForPresident\Wordpress\Init;

/**
 * Theme Setup
 */
function setup() {
  // add any required setup scripts
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


// Require ACF and other plugins
add_action( 'tgmpa_register', __NAMESPACE__ . '\\my_theme_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function my_theme_register_required_plugins() {
  /*
   * Array of plugin arrays. Required keys are name and slug.
   * If the source is NOT from the .org repo, then source is also required.
   */
  $plugins = array(

    // Include Advanced Custom Fields from the WordPress Plugin Repository.
    array(
      'name'      => 'Advanced Custom Fields',
      'slug'      => 'advanced-custom-fields',
      'required'  => true,
    ),

  );

  /*
   * Array of configuration settings. Amend each line as needed.
   *
   * TGMPA will start providing localized text strings soon. If you already have translations of our standard
   * strings available, please help us make TGMPA even better by giving us access to these translations or by
   * sending in a pull-request with .po file(s) with the translations.
   *
   * Only uncomment the strings in the config array if you want to customize the strings.
   */
  $config = array(
    'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => '',                      // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'themes.php',            // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => false,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => true,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.

    /*
    'strings'      => array(
      'page_title'                      => __( 'Install Required Plugins', 'theme-slug' ),
      'menu_title'                      => __( 'Install Plugins', 'theme-slug' ),
      'installing'                      => __( 'Installing Plugin: %s', 'theme-slug' ), // %s = plugin name.
      'oops'                            => __( 'Something went wrong with the plugin API.', 'theme-slug' ),
      'notice_can_install_required'     => _n_noop(
        'This theme requires the following plugin: %1$s.',
        'This theme requires the following plugins: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_can_install_recommended'  => _n_noop(
        'This theme recommends the following plugin: %1$s.',
        'This theme recommends the following plugins: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_cannot_install'           => _n_noop(
        'Sorry, but you do not have the correct permissions to install the %1$s plugin.',
        'Sorry, but you do not have the correct permissions to install the %1$s plugins.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_ask_to_update'            => _n_noop(
        'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.',
        'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_ask_to_update_maybe'      => _n_noop(
        'There is an update available for: %1$s.',
        'There are updates available for the following plugins: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_cannot_update'            => _n_noop(
        'Sorry, but you do not have the correct permissions to update the %1$s plugin.',
        'Sorry, but you do not have the correct permissions to update the %1$s plugins.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_can_activate_required'    => _n_noop(
        'The following required plugin is currently inactive: %1$s.',
        'The following required plugins are currently inactive: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_can_activate_recommended' => _n_noop(
        'The following recommended plugin is currently inactive: %1$s.',
        'The following recommended plugins are currently inactive: %1$s.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'notice_cannot_activate'          => _n_noop(
        'Sorry, but you do not have the correct permissions to activate the %1$s plugin.',
        'Sorry, but you do not have the correct permissions to activate the %1$s plugins.',
        'theme-slug'
      ), // %1$s = plugin name(s).
      'install_link'                    => _n_noop(
        'Begin installing plugin',
        'Begin installing plugins',
        'theme-slug'
      ),
      'update_link'             => _n_noop(
        'Begin updating plugin',
        'Begin updating plugins',
        'theme-slug'
      ),
      'activate_link'                   => _n_noop(
        'Begin activating plugin',
        'Begin activating plugins',
        'theme-slug'
      ),
      'return'                          => __( 'Return to Required Plugins Installer', 'theme-slug' ),
      'plugin_activated'                => __( 'Plugin activated successfully.', 'theme-slug' ),
      'activated_successfully'          => __( 'The following plugin was activated successfully:', 'theme-slug' ),
      'plugin_already_active'           => __( 'No action taken. Plugin %1$s was already active.', 'theme-slug' ),  // %1$s = plugin name(s).
      'plugin_needs_higher_version'     => __( 'Plugin not activated. A higher version of %s is needed for this theme. Please update the plugin.', 'theme-slug' ),  // %1$s = plugin name(s).
      'complete'                        => __( 'All plugins installed and activated successfully. %1$s', 'theme-slug' ), // %s = dashboard link.
      'contact_admin'                   => __( 'Please contact the administrator of this site for help.', 'tgmpa' ),

      'nag_type'                        => 'updated', // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
    ),
    */
  );

  tgmpa( $plugins, $config );
}
