<?php
/* Template Name: Home */
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
      <section class="left">


        <div class="rte">
          <?php the_content(); ?>
        </div>
      </section>
      <aside class="right">
        <div class="bernie-face">
          <img src="https://votesmart.org/canphoto/27110_lg.jpg" />
        </div>
        <div class="quote">
          <p>
            "Nobody who works 40 hours a week should be living in poverty"
          </p>
          <span>-Bernie Sanders</span>
        </div>
      </aside>
    </div>
  </div>
</article>

<?php get_footer(); ?>
