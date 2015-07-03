<?php get_header(); ?>
<h2>Events!</h2>

<?php while(have_posts()) : the_post(); ?>
  <article>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </article>
<?php endwhile; ?>
<?php get_footer(); ?>
