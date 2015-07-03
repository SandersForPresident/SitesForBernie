<?php
namespace SandersForPresident\Wordpress\CustomPosts\Events\Table;

use SandersForPresident\Wordpress\Models\EventModel;

const DATE_COLUMN = 'event_date';
const LOCATION_COLUMN = 'location';

/**
 * Add custom table headers with specific ordering
 */
function column_header($columns) {
  $reorderd = array();
  foreach ($columns as $slug => $title) {
    if ($slug === 'date') {
      // insert columns before the post date column
      $reordered[DATE_COLUMN] = 'Event Date';
      $reordered[LOCATION_COLUMN] = 'Location';
    }
    $reordered[$slug] = $title;
  }
  return $reordered;
}

/**
 * Dispatch custom column content rendering
 */
function column_content($column_name, $postID) {
  switch ($column_name) {
    case DATE_COLUMN:
      date_column_content($postID);
      break;
    case LOCATION_COLUMN:
      location_column_content($postID);
      break;
  }
}

function column_sortable($columns) {
  $columns[DATE_COLUMN] = DATE_COLUMN;
  return $columns;
}

/**
 * Render date column content
 */
function date_column_content($postID) {
  $date = get_field('date', $postID);
  $time = get_field('time', $postID);

  echo EventModel::formatDate(get_field('date', $postID));
  if (!empty($time)) {
    echo "<br/>";
    echo $time;
  }
}

/**
 * Render location column content
 */
function location_column_content($postID) {
  $location = get_field('location', $postID);
  if (!empty($location)) {
    echo $location['address'];
  }
}

/**
 * Apply sortable rules
 */
function sortable_rules($vars) {
  if (!isset($vars['post_type']) || $vars['post_type'] !== 'event' || !isset($vars['orderby'])) {
    return $vars;
  }

  if ($vars['orderby'] === DATE_COLUMN) {
    // sort by the date meta field
    $vars = array_merge(
      $vars,
      array(
        'meta_key' => 'date',
        'orderby' => 'meta_value'
      )
    );
  }

  return $vars;
}

function column_admin_bootstrap_hook() {
  // custom column headings
  add_filter('manage_event_posts_columns', __NAMESPACE__ . '\\column_header', 10);

  // custom column sorting
  add_filter('manage_edit-event_sortable_columns', __NAMESPACE__ . '\\column_sortable');

  // custom column content
  add_action('manage_event_posts_custom_column', __NAMESPACE__ . '\\column_content', 10, 2);

  // custom table sorting rules
  add_filter('request', __NAMESPACE__ . '\\sortable_rules');
}

// only apply custom table rules on edit page
add_action('load-edit.php', __NAMESPACE__ . '\\column_admin_bootstrap_hook');
