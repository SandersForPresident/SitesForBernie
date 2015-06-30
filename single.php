<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>
  <h2><?php the_title(); ?></h2>
  <?php the_content(); ?>
<?php endwhile; ?>

<?php get_footer(); ?>
