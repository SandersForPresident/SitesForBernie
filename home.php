<?php get_header(); ?>

<?php
use SandersForPresident\Wordpress\Services\News\NewsFeedService;

$newsFeedService = new NewsFeedService();
$news = $newsFeedService->getNewsFeed();
?>
<div class="container blog">
  <div class="page-container">
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
