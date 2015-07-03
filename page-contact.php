<?php
/* Template Name: Contact */
get_header();
the_post();
?>

<article class="container">
  <div class="page-container">
    <div class="page-title">
      <h2>Reach out</h2>
      <h1><?php the_title(); ?></h1>
    </div>

    <div class="rte">
      <?php the_content(); ?>
    </div>

  </div>
</article>

<?php get_footer(); ?>


<?php get_footer(); ?>
