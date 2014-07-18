$ ->

	if ($(window).width() > 600)

		setGPII()

		$("#GPII > a").click (e) ->
			e.preventDefault()
			setGPII()

		$("#C4a > a").click (e) -> 
			e.preventDefault()
			setC4a()

		$("#P4a > a").click (e) ->
			e.preventDefault()
			setP4a()

		$("#used > a").click (e) ->
			e.preventDefault()
			setUSED()

		$("#uiita > a").click (e) ->
			e.preventDefault()
			setRERC()

reset = ->
	$("#gpii-blocks li div").removeAttr "prjct"
	$("#gpii-page-menu li").removeClass "active"
	$("#GPII-text").hide()
	$("#cloud4all-text").hide()
	$("#p4a-text").hide()
	$("#used-text").hide()
	$("#rerc-text").hide()

setGPII = ->
	reset()
	$("#GPII").addClass "active"
	$("#GPII-text").show()

setC4a = ->
	reset()
	$("#C4a").addClass "active"
	$("#block-3 > div").attr "prjct", "C4a"
	$("#block-4 > div.block-title").attr "prjct", "C4a"
	$("#block-6 > div").attr "prjct", "C4a"
	$("#block-7 > div").attr "prjct", "C4a"
	$("#block-8 > div").attr "prjct", "C4a"
	$("#cloud4all-text").show()

setP4a = ->
	reset();
	$("#P4a").addClass "active"
	$("#block-4 > div.block-descr").attr "prjct", "P4a"
	$("#block-9 > div").attr "prjct", "P4a"
	$("#block-10 > div").attr "prjct", "P4a"
	$("#block-11 > div").attr "prjct", "P4a"
	$("#block-12 > div").attr "prjct", "P4a"
	$("#block-13 > div").attr "prjct", "P4a"
	$("#block-14 > div").attr "prjct", "P4a"
	$("#block-15 > div").attr "prjct", "P4a"
	$("#p4a-text").show()

setUSED = ->
	reset()
	$("#used").addClass "active"
	$("#block-2 > div").attr "prjct", "used"
	$("#used-text").show()

setRERC = ->
	reset();
	$("#uiita").addClass "active"
	$("#block-5 > div").attr "prjct", "rerc"
	$("#rerc-text").show()

