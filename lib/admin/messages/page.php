<?php
use SandersForPresident\Wordpress\Admin\Messages\MessageTable;
$table = new MessageTable();
$table->prepare_items();
?>

<h1>YO</h1>
<!--table class="wp-list-table widefat fixed striped pages">
  <thead>

  </thead>
</table-->

<?php $table->display(); ?>
