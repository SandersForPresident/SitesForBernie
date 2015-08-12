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

<div class="container events list">
  <div class="page-container">
    <div class="page-title">
      <?php if ($EventPageModel->subtitle) : ?>
        <h3><?php echo $EventPageModel->subtitle; ?></h3>
      <?php endif; ?>
      <h2><?php echo $EventPageModel->title; ?></h2>
    </div>

    <section>
      <h3>
        Looking for events in your area?<br/>
        <strong>There are <?php echo intval($localEvents->settings->count); ?> local events out of <?php echo intval($events->settings->count); ?> total events.</strong>
      </h3>


      <?php foreach ($localEvents->results as $event) : ?>
        <article>
          <h3><a href="<?php echo $event->url; ?>"><?php echo $event->name; ?></a></h3>
          <h4>
            <?php echo date('l F j, Y', strtotime($event->start_dt)); ?><br/>
            <?php echo $event->venue_city; ?>, <?php echo $event->venue_state_cd; ?>
          </h4>
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
    </section>

  </div>
</div>
<?php get_footer(); ?>
