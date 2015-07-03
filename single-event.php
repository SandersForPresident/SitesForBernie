<?php
  use SandersForPresident\Wordpress\Models\EventModel;
  get_header();
  the_post();
  $event = new EventModel(get_the_id());
?>

<article class="container">
  <div class="page-container">
    <div class="page-title">
      <h2>Mark your calendar</h2>
      <h1><?php echo $event->getTitle(); ?></h1>
    </div>

    <section class="event-info">
      <h4>WHEN?</h4>
      <p><?php echo $event->getDate(); ?></p>
      <?php if ($event->hasTime()) : ?>
        <p><?php echo $event->time; ?></p>
      <?php endif; ?>

      <?php if ($event->hasLocation()) : ?>
        <h4>WHERE?</h4>
        <p><?php echo $event->getLocationCopy(); ?></p>
      <?php endif; ?>
    </section>

    <section>
      <h4>INFORMATION</h4>
      <div class="rte">
        <?php echo $event->getContent(); ?>
      </div>
    </section>
  </div>
</article>

<?php get_footer(); ?>
