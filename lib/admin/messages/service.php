<?php

namespace SandersForPresident\Wordpress\Admin\Messages;

class MessageService {
  const POST_TYPE_SLUG = 'contact_message';

  private $mocks = array();

  public function __construct() {
    $this->mocks[0] = new MessageModel(array('id' => 1, 'title' => 'A new message', 'body' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum posuere iaculis consequat. Donec eget metus in urna egestas tempor. Maecenas suscipit ullamcorper ipsum sit amet egestas. Suspendisse malesuada magna sit amet lorem imperdiet accumsan. Pellentesque ornare iaculis interdum. Nam varius malesuada ipsum vitae convallis. Quisque luctus ligula dui, nec fermentum eros tincidunt ac. Fusce non imperdiet nisi, a venenatis turpis. Aenean a convallis lacus. Nam at turpis eget mi sodales imperdiet. Proin eleifend justo vel lectus fermentum volutpat. Maecenas ullamcorper posuere risus vel bibendum. Vestibulum sagittis hendrerit tincidunt.', 'read' => false, 'date' => time(), 'from' => array('name' => 'Atticus White', 'email' => 'contact@atticuswhite.com')));
    $this->mocks[1] = new MessageModel(array('id' => 2, 'title' => 'Another meessage', 'body' => 'This is just another one', 'read' => true, 'date' => time(), 'from' => array('name' => 'Atticus White', 'email' => 'contact@atticuswhite.com')));
  }

  public function getMessages() {
    return $this->mocks;
  }

  public function getMessage($id) {
    foreach ($this->mocks as $mock) {
      if ($mock->id == $id) {
        return $mock;
      }
    }
    return null;
  }
}
