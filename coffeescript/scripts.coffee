tooltipDivStyle =
		class : 'tooltip'

tooltipDiv = $(
	'<div>'
	tooltipDivStyle
)

$ ->

	navMenuTop = $('.main-navigation').offset().top

	pageWidth = $('#page').width() - 48

	$(window).scroll -> 
		if $(window).scrollTop() > navMenuTop
			if pageWidth > 600
				$('.main-navigation').css
					position: 'fixed'
					top: 0
					width: pageWidth;
		else
			$('.main-navigation').css
				position: 'static'
				top: '0px'


	$('#video-play-link').click (e) ->
		e.preventDefault()
		$('#video-overlay').hide()
		$('#home-video').trigger "play"


	$('.tooltips').hover(
		->
			$(tooltipDiv).text(@.dataset.info)
			$(this).parent('li').append tooltipDiv
			$(tooltipDiv).css 'display', 'block'
		->
			$(tooltipDiv).css 'display', 'none'
	)
