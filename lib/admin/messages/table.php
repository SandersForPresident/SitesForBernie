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
      'message_id' => 'ID',
      'message_title' => 'Title'
    );
  }

  public function prepare_items() {
    $this->items = $this->service->getMessages();
  }

  public function display_rows() {
    foreach ($this->items as $message) {
      echo "<tr>";
      echo "<td>{$message['id']}</td>";
      echo "<td>{$message['title']}</td>";
      echo "</tr>";
    }
  }
}
