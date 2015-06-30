<?php get_header(); ?>

<?php if (!have_posts()) : ?>
  Sorry, no results were found.
  <?php get_search_form(); ?>
<?php endif; ?>

<?php while (have_posts()) : the_post(); ?>
  <h2><?php the_title(); ?></h2>
  <?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
