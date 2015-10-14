<?php
namespace SandersForPresident\Wordpress\Admin\Messages;

if(!class_exists('WP_List_Table')){
   require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

use WP_List_Table;

class MessageTable extends WP_List_Table {
  private $service;

  public function __construct() {
    parent::__construct(array(
      'singular' => 'Message',
      'plural' => 'Messages',
      'ajax' => false
    ));
    $this->service = new MessageService();
  }

  public function get_columns() {
    return array(
      'cb' => '<input type="checkbox" />',
      'message_title' => 'Title',
      'message_from' => 'From',
      'message_date' => 'Date'
    );
  }

  public function get_views() {
    return array(
      'all' => '<a href="#">All</a>',
      'trash' => '<a href="#">Trash</a>'
    );
  }

  public function column_cb($item) {
    return "<input type=\"checkbox\" name=\"message[]\" value=\"{$item->id}\" />";
  }

  public function column_message_title($item) {
    if (!$item->read) {
      $title = "<strong>{$item->title}</strong>";
    } else {
      $title = $item->title;
    }

    $actions = array(
      'view' => "<a href=\"?page={$_REQUEST['page']}&action=view&post={$item->id}\">View</a>"
    );
    return $title . $this->row_actions($actions, false);
  }

  public function column_message_from($item) {
    $name = $item->from['name'];
    $email = "<a href=\"mailto:{$item->from['email']}\">{$item->from['email']}</a>";
    return $name . "<br/>" . $email;
  }

  public function column_message_date($item) {
    return $item->getDate();
  }

  public function get_sortable_columns() {
    return array(
      'message_title' => array('message_title', false)
    );
  }

  public function get_bulk_actions() {
    return array(
      'delete' => 'Delete'
    );
  }

  public function prepare_items() {
    $this->_column_headers = array($this->get_columns(), array(), array());
    $this->items = $this->service->getMessages();
    $this->set_pagination_args(array(
      'total_items' => count($this->items),
      'per_page' => 10
    ));
  }
}
