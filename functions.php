<?php

/**
 * SandersForPresident includes
 */
$sanders_includes = [
  'lib/init.php',
  'lib/assets.php',
  'lib/services/remote_news_feed.php',
  'lib/models/base.php',
  'lib/models/post.php',
  'lib/models/header.php',
  'lib/models/footer.php',
  'lib/models/event_page.php'
];

foreach ($sanders_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once($filepath);
}

// cleanup global vars
unset($file, $filepath);
