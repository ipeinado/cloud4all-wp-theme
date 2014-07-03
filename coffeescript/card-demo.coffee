$ ->

	console.log "in card demo"

	MSG_IDLE: "Drag one of the cards over the NFC reader in the right and see how the contents will autoadapt to the user's needs and preferences."
	MSG_SAMMY: "Sammy likes high contrast. Move Sammy's card over the NFC reader on the right to see how the page adapts to his needs."    
	MSG_SAMMY_ON: "You are now keyed in as Sammy. If you want to key out and get back to the normal page, move Sammy's card over the NFC reader"
	MSG_CARLA: "Carla likes big fonts and no images. Move Carla's card over the NFC reader on the right to see how the page adapts to her needs"
	MSG_CARLA_ON: "You are now keyed in as Carla. If you want to key out and get back to the normal page, move Carla's card over the NFC reader"
	
	userKeyed = userKeyed or false

	token = $.cookie("token") or ""

	if token is ""
		$("html").removeAttr "token"
		userKeyed = false
	else
		$("html").attr "token", token
		userKeyed = true

		if token is "sammy"
			$("#card-tooltip-text").html MSG_SAMMY_ON
		else
			if token is "carla"
				$("#card-tooltip-text").html MSG_CARLA_ON

	$('#card-sammy').hover ->
		$("#card-tooltip-text").html MSG_SAMMY
	, ->
		$("#card-tooltip-text").html MSG_CARLA