(function ($) {
  var BREAKPOINT = 992,
      headerUpdated = false;

  function updateHeader () {
    if ($(window).width() >= BREAKPOINT && !headerUpdated) {
      $('header nav').css('display', '');
      $('.responsive-nav-toggle').removeClass('nav-open');
      headerUpdated = true;
    } else if ($(window).width() < BREAKPOINT) {
      headerUpdated = false;
    }
  }

  $(document).ready(function () {
    $('.responsive-nav-toggle').click(function () {
      $(this).toggleClass('nav-open');
      $('header nav').stop().slideToggle();
      return false;
    });

    updateHeader();
    $(window).on('resize', updateHeader);
  });
}).call(this, jQuery);
