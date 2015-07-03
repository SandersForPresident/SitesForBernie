<?php get_header(); ?>

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
