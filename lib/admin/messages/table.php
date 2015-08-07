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
      'message_id' => 'ID',
      'message_title' => 'Title',
      'message_date' => 'Date'
    );
  }

  public function column_cb($item) {
    return '<input type="checkbox" />';
  }

  public function column_message_id($item) {
    return $item['id'];
  }

  public function column_message_title($item) {
    return $item['title'];
  }

  public function column_message_date() {
    return "August 04, 2015 11:00pm";
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
  }
}
