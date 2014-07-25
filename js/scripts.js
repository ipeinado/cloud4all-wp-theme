(function() {
  var tooltipDiv, tooltipDivStyle;

  tooltipDivStyle = {
    "class": 'tooltip'
  };

  tooltipDiv = $('<div>', tooltipDivStyle);

  $(function() {
    var navMenuTop, pageWidth;
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
    $('#video-play-link').click(function(e) {
      e.preventDefault();
      $('#video-overlay').hide();
      return $('#home-video').trigger("play");
    });
    return $('.tooltips').hover(function() {
      $(tooltipDiv).text(this.dataset.info);
      $(this).parent('li').append(tooltipDiv);
      return $(tooltipDiv).css('display', 'block');
    }, function() {
      return $(tooltipDiv).css('display', 'none');
    });
  });

}).call(this);
