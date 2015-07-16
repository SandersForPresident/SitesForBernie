<?php
/* Template Name: Contact */
get_header();
the_post();
?>

<article class="container">
  <div class="page-container">
    <div class="page-title">
      <h3>Reach out</h3>
      <h2><?php the_title(); ?></h2>
    </div>

    <div class="rte">
      <?php the_content(); ?>
    </div>

  </div>
</article>

<?php get_footer(); ?>


<?php get_footer(); ?>
