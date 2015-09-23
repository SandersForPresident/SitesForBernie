<?php
  get_header();

  use SandersForPresident\Wordpress\Services\News\NewsFeedService;
  use SandersForPresident\Wordpress\Services\News\RemoteNewsFeedService;

  $newsFeedService = new NewsFeedService();
  $remoteNewsFeedService = new RemoteNewsFeedService();
  $localNews = $newsFeedService->getLocalNewsFeed();
  $remoteNews = $remoteNewsFeedService->getFeed();
?>
<div class="container blog list">
  <div class="page-container">
    <div class="page-title">
      <h2>News</h2>
    </div>

    <div class="row">

      <div class="col-md-6">
        <h2>Local News</h2>
        <?php foreach ($localNews as $item): ?>
        <article>
          <h2>
            <a href="<?php echo $item->getLink(); ?>">
              <?php echo $item->getTitle(); ?>
            </a>
          </h2>
          <h4><?php echo $item->getFormattedDate(); ?></h4>
          <div class="rte">
            <?php echo $item->getContent(); ?>
          </div>
        </article>
        <?php endforeach; ?>
      </div>

      <div class="col-md-6">
        <h2>Campaign News</h2>
        <?php foreach ($remoteNews as $item): ?>
        <article>
          <h2>
            <a href="<?php echo $item->getLink(); ?>">
              <?php echo $item->getTitle(); ?>
            </a>
          </h2>
          <h4><?php echo $item->getFormattedDate(); ?></h4>
          <div class="rte">
            <?php echo $item->getContent(); ?>
          </div>
        </article>
        <?php endforeach; ?>
      </div>
    </div>

    <!--
    <?php foreach ($news as $item) : ?>
      <article<?php if ($item->isRemote()) : ?> class="official"<?php endif; ?>>
        <?php if ($item->isRemote()) : ?><h5>Campaign News</h5><?php endif; ?>
        <h2>
          <a href="<?php echo $item->getLink(); ?>">
            <?php echo $item->getTitle(); ?>
          </a>
        </h2>
        <h4><?php echo $item->getFormattedDate(); ?></h4>
        <div class="rte">
          <?php echo $item->getContent(); ?>
        </div>
      </article>
    <?php endforeach; ?>
  -->
  </div>
</div>
<?php get_footer(); ?>
