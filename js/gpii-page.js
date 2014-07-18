(function() {
  var reset, setC4a, setGPII, setP4a, setRERC, setUSED;

  $(function() {
    if ($(window).width() > 600) {
      setGPII();
      $("#GPII > a").click(function(e) {
        e.preventDefault();
        return setGPII();
      });
      $("#C4a > a").click(function(e) {
        e.preventDefault();
        return setC4a();
      });
      $("#P4a > a").click(function(e) {
        e.preventDefault();
        return setP4a();
      });
      $("#used > a").click(function(e) {
        e.preventDefault();
        return setUSED();
      });
      return $("#uiita > a").click(function(e) {
        e.preventDefault();
        return setRERC();
      });
    }
  });

  reset = function() {
    $("#gpii-blocks li div").removeAttr("prjct");
    $("#gpii-page-menu li").removeClass("active");
    $("#GPII-text").hide();
    $("#cloud4all-text").hide();
    $("#p4a-text").hide();
    $("#used-text").hide();
    return $("#rerc-text").hide();
  };

  setGPII = function() {
    reset();
    $("#GPII").addClass("active");
    return $("#GPII-text").show();
  };

  setC4a = function() {
    reset();
    $("#C4a").addClass("active");
    $("#block-3 > div").attr("prjct", "C4a");
    $("#block-4 > div.block-title").attr("prjct", "C4a");
    $("#block-6 > div").attr("prjct", "C4a");
    $("#block-7 > div").attr("prjct", "C4a");
    $("#block-8 > div").attr("prjct", "C4a");
    return $("#cloud4all-text").show();
  };

  setP4a = function() {
    reset();
    $("#P4a").addClass("active");
    $("#block-4 > div.block-descr").attr("prjct", "P4a");
    $("#block-9 > div").attr("prjct", "P4a");
    $("#block-10 > div").attr("prjct", "P4a");
    $("#block-11 > div").attr("prjct", "P4a");
    $("#block-12 > div").attr("prjct", "P4a");
    $("#block-13 > div").attr("prjct", "P4a");
    $("#block-14 > div").attr("prjct", "P4a");
    $("#block-15 > div").attr("prjct", "P4a");
    return $("#p4a-text").show();
  };

  setUSED = function() {
    reset();
    $("#used").addClass("active");
    $("#block-2 > div").attr("prjct", "used");
    return $("#used-text").show();
  };

  setRERC = function() {
    reset();
    $("#uiita").addClass("active");
    $("#block-5 > div").attr("prjct", "rerc");
    return $("#rerc-text").show();
  };

}).call(this);
