(function($) {
	$(function() {

        <?php 
			$autoplay = ( $settings->autoplay <> '' ) ? $settings->autoplay : 'false';
			for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; 
			endfor;
		?>
		$(".fl-node-<?php echo $id; ?> .slider-template.owl-carousel").owlCarousel({
			items: 1,
			margin: 0,
            dots: false,
			nav: true,
			navText: ['',''],
			autoplay: <?php echo $autoplay; ?>,
			autoplayTimeout: 7000,
			<?php if ( $i > 1 ) { ?>loop: false,<?php } else { ?>loop: false,<?php } ?>
			autoHeight: true,
			animateOut: 'fadeOut',
			mouseDrag: false,
		});
		
		
	});
	
})(jQuery);