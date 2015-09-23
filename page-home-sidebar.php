<?php
/* Template Name: Home with Sidebar */
get_header();
the_post();
?>

<article class="container home">
  <div class="page-container">
    <div class="page-title">
      <h3>Welcome To</h3>
      <h2><?php the_title(); ?></h2>
    </div>
    <div class="row">
      <div class="col-md-9">
        <section>
          <div class="rte">
            <?php the_content(); ?>
          </div>
        </section>
      </div>
      <div class="col-md-3">
        <?php dynamic_sidebar('page'); ?>
      </div>
  </div>
</article>

<?php get_footer(); ?>
