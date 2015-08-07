<?php

namespace SandersForPresident\Wordpress\Admin\Messages;

class MessageService {
  const POST_TYPE_SLUG = 'contact_message';

  private $mocks = array (
    array('id' => 1, 'title' => 'A new message', 'body' => 'This is my message', 'read' => false),
    array('id' => 2, 'title' => 'Another meessage', 'body' => 'This is just another one', 'read' => true)
  );

  public function getMessages() {
    return $this->mocks;
  }

  public function getMessage($id) {
    foreach ($this->mocks as $mock) {
      if ($mock['id'] == $id) {
        return $mock;
      }
    }
    return null;
  }
}
