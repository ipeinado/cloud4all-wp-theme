(function() {
  var MSG_ACTIVE, MSG_CARLA, MSG_CARLA_ON, MSG_IDLE, MSG_SAMMY, MSG_SAMMY_ON, draggable_options, keyUserIn, userKeyed;

  MSG_IDLE = "Drag one of the cards over the NFC reader in the right and see how the contents will autoadapt to the user's needs and preferences.";

  MSG_SAMMY = "Sammy likes high contrast. Move Sammy's card over the NFC reader on the right to see how the page adapts to his needs.";

  MSG_SAMMY_ON = "You are now keyed in as Sammy. If you want to key out and get back to the normal page, move Sammy's card over the NFC reader";

  MSG_CARLA = "Carla likes big fonts and no images. Move Carla's card over the NFC reader on the right to see how the page adapts to her needs";

  MSG_CARLA_ON = "You are now keyed in as Carla. If you want to key out and get back to the normal page, move Carla's card over the NFC reader";

  MSG_ACTIVE = MSG_IDLE;

  userKeyed = userKeyed || false;

  draggable_options = {
    containment: "#cards-banner",
    cursor: "move",
    revert: true,
    stop: function(event, ui) {
      return $("#card-tooltip-text").html(MSG_ACTIVE);
    }
  };

  keyUserIn = function(token) {
    $.cookie("token", token);
    $('html').attr("token", token);
    if (token === "sammy") {
      MSG_ACTIVE = MSG_SAMMY_ON;
      $("#card-sammy").addClass("active");
      $("#card-carla").removeClass("active");
    }
    if (token === "carla") {
      MSG_ACTIVE = MSG_CARLA_ON;
      $("#card-carla").addClass("active");
      $("#card-sammy").removeClass("active");
    }
    return $("#card-tooltip-text").html(MSG_ACTIVE);
  };

  $(function() {
    var token;
    token = $.cookie("token");
    if (typeof token === 'undefined') {
      userKeyed = false;
    } else {
      userKeyed = true;
      console.log(token);
      keyUserIn(token);
    }
    $('#card-sammy').hover(function() {
      return $("#card-tooltip-text").html(MSG_SAMMY);
    }, function() {
      return $("#card-tooltip-text").html(MSG_ACTIVE);
    });
    $('#card-carla').hover(function() {
      return $("#card-tooltip-text").html(MSG_CARLA);
    }, function() {
      return $("#card-tooltip-text").html(MSG_ACTIVE);
    });
    $("#card-sammy").draggable(draggable_options);
    $("#card-carla").draggable(draggable_options);
    return $("#nfc-reader").droppable({
      tolerance: 'fit',
      activeClass: 'active',
      over: function(event, ui) {
        if (userKeyed === true) {
          if (token === (ui.draggable.attr("data-token"))) {
            $.removeCookie("token");
            $("html").removeAttr("token");
            $("#card-tooltip-text").html("<br />KEYING OUT...<br />");
            userKeyed = false;
            MSG_ACTIVE = MSG_IDLE;
            $("#card-sammy").removeClass("active");
            return $("#card-carla").removeClass("active");
          } else {
            $("#card-tooltip-text").html("<br />KEYING IN...<br />");
            token = ui.draggable.attr("data-token");
            return keyUserIn(token);
          }
        } else {
          $("#card-tooltip-text").html("<br />KEYING IN...<br />");
          userKeyed = true;
          token = ui.draggable.attr("data-token");
          return keyUserIn(token);
        }
      }
    });
  });

}).call(this);
