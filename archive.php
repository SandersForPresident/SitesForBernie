<?php get_header(); ?>
<?php
use SandersForPresident\Wordpress\Services\News;

$newsFeedService = new NewsFeedService();
$news = $newsFeedService->getFeed();
echo "<pre>WTF";
  print_r($news);
  die();
?>
<div class="container blog">
  <div class="page-container">
    <?php while (have_posts()) : the_post(); ?>
      <article>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <?php the_excerpt(); ?>
      </article>
    <?php endwhile; ?>
  </div>
</div>

<?php get_footer(); ?>
