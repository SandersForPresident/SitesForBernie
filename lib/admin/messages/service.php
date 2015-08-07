<?php

namespace SandersForPresident\Wordpress\Admin\Messages;

class MessageService {
  const POST_TYPE_SLUG = 'contact_message';

  public function getMessages() {
    return array (
      array('id' => 1, 'title' => 'A new message', 'body' => 'This is my message'),
      array('id' => 2, 'title' => 'Another meessage', 'body' => 'This is just another one')
    );
  }
}
