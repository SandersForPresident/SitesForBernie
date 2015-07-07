<?php
  get_header();

  use SandersForPresident\Wordpress\Services\News\NewsFeedService;

  $newsFeedService = new NewsFeedService();
  $news = $newsFeedService->getNewsFeed();
?>
<div class="container blog list">
  <div class="page-container">
    <div class="page-title">
      <h2>Find out what's going on near you</h2>
      <h1>News</h1>
    </div>

    <?php foreach ($news as $item) : ?>
      <article>
        <h2>
          <a href="<?php echo $item->getLink(); ?>">
            <?php if ($item->isRemote()): ?><span style="color: #277cc0;">BERNIE POST:</span><?php endif; ?>
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
<?php get_footer(); ?>
