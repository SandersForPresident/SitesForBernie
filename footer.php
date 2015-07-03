<?php
  use SandersForPresident\Wordpress\Models\FooterModel;
  $footer = new FooterModel();
 ?>

  <footer>
    <div class="container">
      <div class="offset">

        <div class="links">

          <!-- Social Links -->
          <div class="column">
            <h3><?php echo $footer->leftNavigation->title; ?></h3>
            <ul>
              <?php foreach ($footer->leftNavigation->items as $item) : ?>
                <li>
                  <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>" target="_blank"><?php echo $item->title; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <!-- end: Social Links -->

          <!-- Presidential Campaign Links -->
          <div class="column">
            <h3>Bernie</h3>
            <ul>
              <li><a href="#">Official Website</a></li>
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Reddit</a></li>
              <li><a href="#">Instagram</a></li>
              <li><a href="#">YouTube</a></li>
            </ul>
          </div>
          <!-- end: Presidental Campaign Links -->

          <!-- Organization Links -->
          <div class="column">
            <h3><?php echo $footer->rightNavigation->title; ?></h3>
            <ul>
              <?php foreach ($footer->rightNavigation->items as $item) : ?>
                <li>
                  <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <!-- end: Oragnization Links -->

        </div>

        <div class="byline">
          Donated by <a href="https://www.reddit.com/r/CodersForSanders" target="_blank">/r/CodersForSanders</a>.
          Not authorized by any candidate or committee
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
  </body>
</html>
