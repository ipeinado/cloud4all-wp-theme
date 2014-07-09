(function() {
  $(function() {
    var navMenuTop, pageWidth;
    console.log("in scripts");
    navMenuTop = $('.main-navigation').offset().top;
    pageWidth = $('#page').width() - 48;
    $(window).scroll(function() {
      if ($(window).scrollTop() > navMenuTop) {
        if (pageWidth > 600) {
          return $('.main-navigation').css({
            position: 'fixed',
            top: 0,
            width: pageWidth
          });
        }
      } else {
        return $('.main-navigation').css({
          position: 'static',
          top: '0px'
        });
      }
    });
    return $('#video-play-link').click(function(e) {
      e.preventDefault();
      $('#video-overlay').hide();
      return $('#home-video').trigger("play");
    });
  });


  /* Hello */

}).call(this);
