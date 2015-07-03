<?php
/* Template Name: Home */
get_header();
the_post();
?>

<article class="container">
  <div class="page-container">
    <div class="page-title">
      <h2>Welcome To</h2>
      <h1><?php the_title(); ?></h1>
    </div>

    <div class="rte">
      <?php the_content(); ?>
    </div>

  </div>
</article>

<?php get_footer(); ?>
