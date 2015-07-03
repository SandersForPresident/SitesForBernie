<?php

namespace SandersForPresident\Wordpress\Models;

class PostModel extends BaseModel {

  function __construct ($postID = false) {
    global $post;
    $this->postID = $postID ? $postID : $post->ID;
  }

}
