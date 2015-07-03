<?php
  use SandersForPresident\Wordpress\Models\EventsModel;

  get_header();
  $EventsModel = new EventsModel();
?>

<div class="container">
  <div class="page-container">
    <div class="page-title">
      <h2>Mark your calendar</h2>
      <h1>Events to attend around Wisconsin</h1>

      <?php foreach ($EventsModel->events as $event) : ?>
        <article>
          <h3><a href="<?php echo $event->permalink; ?>"><?php echo $event->title; ?></a></h3>

          <span class="date"><?php echo $event->getDate(); ?></span>
          <?php if ($event->hasTime()) : ?>
            <p class="time"><?php echo $event->time; ?></p>
          <?php endif; ?>

          <?php if ($event->hasLocation()) : ?>
            <p class="location"><?php echo $event->getLocationCopy(); ?></p>
          <?php endif; ?>
        </article>
      <?php endforeach; ?>

    </div>
  </div>
</div>
<?php get_footer(); ?>
