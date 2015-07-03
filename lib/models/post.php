<?php

namespace SandersForPresident\Wordpress\Models;

class PostModel extends BaseModel {

  function __construct ($postID = false) {
    global $post;
    $this->postID = $postID ? $postID : $post->ID;

    $this->title = get_the_title($this->postID);
    $this->content = get_the_content();
    $this->permalink = get_permalink($this->postID);
  }

  function getContent() {
    return apply_filters('the_content', $this->content);
  }

  function getTitle() {
    return apply_filters('the_title', $this->title);
  }

}
