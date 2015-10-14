<?php
use SandersForPresident\Wordpress\Admin\Messages\MessageTable;
$table = new MessageTable();
$table->prepare_items();
?>

<div class="wrap">
  <h2>Messages</h2>

  <form method="post">
    <?php $table->views(); ?>
    <?php $table->display(); ?>
  </form>
</div>
