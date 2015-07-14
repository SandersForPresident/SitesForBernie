<?php get_header(); ?>

<div class="container blog">
  <div class="page-container">

    <?php if (!have_posts()) : ?>
      Sorry, no results were found.
    <?php endif; ?>

    <?php while (has_posts()) : the_post(); ?>
      <article>
        <h3><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="rte">
          <?php the_content(); ?>
        </div>
      </article>
    <?php endwhile; ?>
  </div>
</div>
<?php get_footer(); ?>
