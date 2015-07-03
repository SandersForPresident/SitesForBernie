<?php
  use SandersForPresident\Wordpress\Models;
  $footer = new Models\FooterModel();
 ?>

  <footer>
    <div class="container">
      <div class="offset">

        <div class="row">

          <!-- Social Links -->
          <div class="column">
            <h3><?php echo $footer->leftNavigation->title; ?></h3>
            <ul>
              <?php foreach ($footer->leftNavigation->items as $item) : ?>
                <li>
                  <a href="<?php echo $item->url; ?>"><?php echo $item->title; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <!-- end: Social Links -->

          <!-- Presidential Campaign Links -->
          <div class="column">
            <h3>Bernie</h3>
            <ul>
              <li>Link</li>
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
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
  </body>
</html>
