(function($) {
	$(function() {
		<?php if ( $settings->height == 'fullscreen' ) { ?>
			var $window = $(window);
			$window.resize(function resize() {
				
				var adminbarHeight = 0,
					headHeight = 0;
				if ($('#wpadminbar').length ) {
					var adminbarHeight = $("#wpadminbar").outerHeight();
				}
				var pageHeight = $(window).outerHeight(),
					<?php if ( $settings->fullscreen_setting == 'yes' ) { ?>
					headHeight = $("#header").outerHeight(),
					<?php } ?>
					sliderHeight = pageHeight - headHeight - adminbarHeight;
				$(".fl-node-<?php echo $id; ?> .fullscreen.slider-flickity, .fl-node-<?php echo $id; ?> .fullscreen.slider-flickity .slider-flickity, .fl-node-<?php echo $id; ?> .fullscreen.slider-flickity .slider-flickity-item, .fl-node-<?php echo $id; ?> .fullscreen.slider-flickity .flickity-viewport").css('height', sliderHeight);
				
			}).trigger('resize');
		<?php } ?>


		<?php 
			if ( $settings->autoplay_delay == '' ) {
				$autoplay_delay = '6000';
			} else {
				$autoplay_delay = $settings->autoplay_delay;
			}
			if ( $settings->height == 'fullscreen' ) {
				$heightStyle = '"adaptiveHeight": true,';
			}
			if ( $settings->height == 'autoheight' ) {
				$heightStyle = '"adaptiveHeight": true,';
			}
			if ( $settings->height == 'customheight' ) {
				$heightStyle = '';
			}
		?>
			
		flickitySlider();
		$( '.fl-builder-content' ).on( 'fl-builder.layout-rendered', flickitySlider );
		
		function flickitySlider() {
			$(".fl-node-<?php echo $id; ?> .slider-flickity").flickity({
				autoPlay: <?php echo $autoplay_delay; ?>,
				pauseAutoPlayOnHover: false,
				<?php echo $heightStyle; ?>
				wrapAround: true,
				prevNextButtons: true,
				pageDots: true,
				selectedAttraction: 0.003,
				friction: 0.1
			});
			<?php if ($settings->autoplay == 'true') { ?>
				$(".fl-node-<?php echo $id; ?> .slider-flickity").on( "select.flickity", function() { 
					$(this).flickity("playPlayer");
				});
			<?php } ?>
		}
	});
})(jQuery);