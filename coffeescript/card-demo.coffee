MSG_IDLE = "Drag one of the cards over the NFC reader in the right and see how the contents will autoadapt to the user's needs and preferences."
MSG_SAMMY = "Sammy likes high contrast. Move Sammy's card over the NFC reader on the right to see how the page adapts to his needs."    
MSG_SAMMY_ON = "You are now keyed in as Sammy. If you want to key out and get back to the normal page, move Sammy's card over the NFC reader"
MSG_CARLA = "Carla likes big fonts and no images. Move Carla's card over the NFC reader on the right to see how the page adapts to her needs"
MSG_CARLA_ON = "You are now keyed in as Carla. If you want to key out and get back to the normal page, move Carla's card over the NFC reader"
MSG_ACTIVE = MSG_IDLE
userKeyed = userKeyed or false

draggable_options =
	containment: "#cards-banner"
	cursor: "move"
	revert: true
	stop: (event, ui) ->
		$("#card-tooltip-text").html MSG_ACTIVE	

keyUserIn = (token) ->
	$.cookie "token", token, path : "/"
	$('html').attr "token", token
	if token is "sammy"
		MSG_ACTIVE = MSG_SAMMY_ON
		$("#card-sammy").addClass "active"
		$("#card-carla").removeClass "active"
	
	if token is "carla"
		MSG_ACTIVE = MSG_CARLA_ON
		$("#card-carla").addClass "active"
		$("#card-sammy").removeClass "active"

	$("#card-tooltip-text").html MSG_ACTIVE

$ ->

	token = $.cookie "token"

	if typeof token is not "undefined" and token is not null
		userKeyed = false
		console.log "no token"
	else
		userKeyed = true
		console.log token
		keyUserIn token

	$('#card-sammy').hover ->
		$("#card-tooltip-text").html MSG_SAMMY
	, ->
		$("#card-tooltip-text").html MSG_ACTIVE

	$('#card-carla').hover ->
		$("#card-tooltip-text").html MSG_CARLA
	, ->
		$("#card-tooltip-text").html MSG_ACTIVE

	$("#card-sammy").draggable draggable_options
	$("#card-carla").draggable draggable_options

	$("#nfc-reader").droppable
		tolerance: 'fit'
		activeClass: 'active'
		over: (event, ui) ->
			if userKeyed is on
				if token is (ui.draggable.attr "data-token")
					$("html").removeAttr "token"
					$("#card-tooltip-text").html "<br />KEYING OUT...<br />"
					console.log "keying out #{token}"
					userKeyed = false
					MSG_ACTIVE = MSG_IDLE
					$.cookie "token", null, path : "/"
					$.removeCookie "token", path : "/"
					$("#card-sammy").removeClass "active"
					$("#card-carla").removeClass "active"
				else
					$("#card-tooltip-text").html "<br />KEYING IN...<br />"
					token = ui.draggable.attr "data-token"
					keyUserIn token
			else
				$("#card-tooltip-text").html "<br />KEYING IN...<br />"
				userKeyed = true
				token = ui.draggable.attr "data-token"
				keyUserIn token





		

