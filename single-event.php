<?php
use SandersForPresident\Wordpress\Models\EventModel;

get_header();
$event = new EventModel(get_the_id());
?>

<article class="container">
  <div class="page-container">
    <div class="page-title">
      <h2>Mark your calendar</h2>
      <h1><?php echo $event->title; ?></h1>
    </div>

  </div>
</article>

<?php get_footer(); ?>
