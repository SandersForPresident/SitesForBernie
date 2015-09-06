<?php

namespace SandersForPresident\Wordpress\Init;

function create_widget($name, $id, $description) {

  register_sidebar(array(
      'name' => __($name),
      'id' => $id,
      'description' => __($description),
      'before_widget' => '<div class="widget">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

  }

  create_widget('Page  Sidebar', 'page', 'Displays on the side of pages with a sidebar');
