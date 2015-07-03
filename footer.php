<?php
  use SandersForPresident\Wordpress\Models;
  $footer = new Models\FooterModel();

 ?>

 <pre>
   <?php print_r($footer); ?>
 </pre>

  <footer>
    <div class="container">
      <div class="row">

        <!-- Social Links -->
        <div class="column">
          <h2><?php echo $footer->leftNavigation->title; ?></h2>
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
          <h2>Bernie</h2>
          <ul>
            <li>Link</li>
          </ul>
        </div>
        <!-- end: Presidental Campaign Links -->

        <!-- Organization Links -->
        <div class="column">
          <h2><?php echo $footer->rightNavigation->title; ?></h2>
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
  </footer>

  <?php wp_footer(); ?>
  </body>
</html>
