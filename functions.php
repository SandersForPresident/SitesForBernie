<?php

/**
 * SandersForPresident includes
 */
$sanders_includes = [
  'lib/init.php',
  'lib/assets.php'
];

foreach ($sanders_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf('Error locating %s for inclusion', $file), E_USER_ERROR);
  }

  require_once($filepath);
}

// cleanup global vars
unset($file, $filepath);
