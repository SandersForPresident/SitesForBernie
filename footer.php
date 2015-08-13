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
            <?php if ($footer->hasLeftNavigation()) : ?>
            <h3><?php echo $footer->leftNavigation->title; ?></h3>
            <ul>
              <?php foreach ($footer->leftNavigation->items as $item) : ?>
                <li>
                  <a href="<?php echo $item->url; ?>" title="<?php echo $item->title; ?>" target="_blank"><?php echo $item->title; ?></a>
                </li>
              <?php endforeach; ?>
            </ul>
            <?php endif; ?>
          </div>
          <!-- end: Social Links -->

          <!-- Presidential Campaign Links -->
          <div class="column">
            <h3>Bernie</h3>
            <ul>
              <li><a href="https://berniesanders.com" title="The official campaign website for the presidential campaign of United States Senator Bernie Sanders.">Official Website</a></li>
              <li><a href="https://www.facebook.com/berniesanders" title="Bernie Sanders on Facebook">Facebook</a></li>
              <li><a href="https://twitter.com/BernieSanders" title="Bernie Sanders on Twitter">Twitter</a></li>
              <li><a href="https://www.reddit.com/r/SandersForPresident" title="Bernie Sanders for president on Reddit">Reddit</a></li>
              <li><a href="https://instagram.com/berniesanders/" title="Bernie sanders on Instagram">Instagram</a></li>
              <li><a href="https://www.youtube.com/channel/UCH1dpzjCEiGAt8CXkryhkZg" title="Bernie Sanders on YouTube">YouTube</a></li>
            </ul>
          </div>
          <!-- end: Presidental Campaign Links -->

          <!-- Organization Links -->
          <div class="column">
            <h3>Organize</h3>
            <ul>
              <li><a href="https://secure.actblue.com/contribute/page/lets-go-bernie" title="Donate to the Bernie Sanders campaign">Contribute</a></li>
              <li><a href="https://go.berniesanders.com/page/s/join" title="Sign Up to receive updates about Bernie Sanders's campign">Sign Up</a></li>
              <li><a href="https://go.berniesanders.com/page/signup/volunteer-for-bernie" title="Volunteer to help Bernie Sander's campaign">Volunteer</a></li>
              <li><a href="https://go.berniesanders.com/page/event/search_simple" title="Find an event to attend in support of Bernie Sanders">Events</a></li>
              <li><a href="https://berniesanders.com/organize/" title="Organize an event">Organizing Hub</a></li>
              <li><a href="https://store.berniesanders.com/" title="Purchase Bernie Sanders merchandise">Store</a></li>
              <li><a href="https://berniesanders.com/jobswithbernie2016/" title="Find a job with the Bernie Sanders campaign">Jobs</a></li>
            </ul>
          </div>
          <!-- end: Oragnization Links -->

        </div>

        <div class="endorsement">
          <div>
            Donated by <a href="https://www.reddit.com/r/CodersForSanders" target="_blank">Friends of Bernie</a>
          </div>
        </div>
        <div class="byline">
          This site is supported by volunteers and not endorsed or affiliated with the official Bernie Sanders campaign.
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>
  </body>
</html>
