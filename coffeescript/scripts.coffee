$ ->

	console.log "in scripts"

	navMenuTop = $('.main-navigation').offset().top
	pageWidth = $('#page').width() - 48

	$(window).scroll -> 
		if $(window).scrollTop() > navMenuTop
			if pageWidth > 600
				$('.main-navigation').css
					position: 'fixed'
					top: 0
					width: pageWidth
		else
			$('.main-navigation').css
				position: 'static'
				top: '0px'