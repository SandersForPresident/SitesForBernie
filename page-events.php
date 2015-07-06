<?php
  /* Template Name: Events */
  use SandersForPresident\Wordpress\Models\EventPageModel;

  get_header();
  $EventPageModel = new EventPageModel();
?>

<div class="container">
  <div class="page-container">
    <div class="page-title">
      <?php if ($EventPageModel->subtitle) : ?>
        <h2><?php echo $EventPageModel->subtitle; ?></h2>
      <?php endif; ?>
      <h1><?php echo $EventPageModel->title; ?></h1>


      <article>
        <h3>Looking for events in your area?</h3>
        <p>
          Head on over to the campaign's <a href="https://go.berniesanders.com/page/event/search_simple">Event Manager</a> to find an event near you!
        </p>
      </article>

    </div>
  </div>
</div>
<?php get_footer(); ?>
