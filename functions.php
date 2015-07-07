<?php

/**
 * SandersForPresident includes
 */
$sanders_includes = array(
  'lib/init.php',
  'lib/assets.php',
  'lib/services/news/remote_news_feed.php',
  'lib/services/news/news_feed.php',
  'lib/services/events/remote_events.php',
  'lib/models/base.php',
  'lib/models/post.php',
  'lib/models/header.php',
  'lib/models/footer.php',
  'lib/models/event_page.php',
  'lib/models/news/abstract_news_article.php',
  'lib/models/news/remote_news_article.php',
  'lib/models/news/local_news_article.php'
);

foreach ($sanders_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once($filepath);
}

// cleanup global vars
unset($file, $filepath);
