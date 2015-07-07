<?php
  /* Template Name: Events */
  use SandersForPresident\Wordpress\Models\EventPageModel;
  use SandersForPresident\Wordpress\Services\Events\RemoteEventService;

  get_header();
  $EventPageModel = new EventPageModel();
  $eventService = new RemoteEventService();
  $events = $eventService->getAllEvents();
  $localEvents = $eventService->getLocalEvents();
?>

<div class="container events">
  <div class="page-container">
    <div class="page-title">
      <?php if ($EventPageModel->subtitle) : ?>
        <h2><?php echo $EventPageModel->subtitle; ?></h2>
      <?php endif; ?>
      <h1><?php echo $EventPageModel->title; ?></h1>
    </div>

    <article>
      <h3>Looking for events in your area?</h3>
      <h4>There are <?php echo intval($localEvents->settings->count); ?> local events out of <?php echo intval($events->settings->count); ?> total events.</h4>

      <?php foreach ($localEvents->results as $event) : ?>
        <article>
          <h2><?php echo $event->name; ?></h2>
          <h4><a href="<?php echo $event->url; ?>"><?php echo $event->start_dt; ?></a></h4>
          <div class="rte">
            <p>
              <?php echo $event->description; ?>
              <a href="<?php echo $event->url; ?>">Read more</a>
            </p>
          </div>
        </article>
      <?php endforeach; ?>

      <p>
        Head on over to the campaign's <a href="https://go.berniesanders.com/page/event/search_simple">Event Manager</a> to find an event near you!
      </p>
    </article>

  </div>
</div>
<?php get_footer(); ?>
