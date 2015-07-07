<?php get_header(); ?>

<?php
use SandersForPresident\Wordpress\Services\NewsFeedService;

$newsFeedService = new NewsFeedService();
$news = $newsFeedService->getNewsFeed();
?>
<div class="container blog">
  <div class="page-container">

    <?php if (!have_posts()) : ?>
      Sorry, no results were found.
    <?php endif; ?>

    <?php foreach ($news as $item) : ?>
      <article>
        <h2><a href="<?php echo $item->getLink(); ?>"><?php echo $item->getTitle(); ?></a></h2>
        <div class="rte">
          <?php echo $item->getContent(); ?>
        </div>
      </article>
    <?php endforeach; ?>
  </div>
</div>
<?php get_footer(); ?>
