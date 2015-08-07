<?php
use SandersForPresident\Wordpress\Admin\Messages\MessageService;
$messageService = new MessageService();
?>

<h1>YO</h1>
<pre>
  <?php echo $messageService->getMessages(); ?>
</pre>
