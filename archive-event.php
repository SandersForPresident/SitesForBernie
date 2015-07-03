<?php
  /* Template Name: Events */
  use SandersForPresident\Wordpress\Models\EventsModel;
  use SandersForPresident\Wordpress\Models\EventPageModel;

  get_header();
  $EventsModel = new EventsModel();
  $EventPageModel = new EventPageModel();
  wp_reset_query();
?>

<div class="container">
  <div class="page-container">
    <div class="page-title">
      <?php if ($EventPageModel->subtitle) : ?>
        <h2><?php echo $EventPageModel->subtitle; ?></h2>
      <?php endif; ?>
      <h1><?php echo $EventPageModel->title; ?></h1>

      <?php foreach ($EventsModel->events as $event) : ?>
        <article>
          <h3><a href="<?php echo $event->permalink; ?>"><?php echo $event->getTitle(); ?></a></h3>

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
