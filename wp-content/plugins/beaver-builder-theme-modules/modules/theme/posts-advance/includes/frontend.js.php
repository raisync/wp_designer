(function($) {
	$(function() {
		<?php 
			$effects = ( $settings->effects <> '' ) ? $settings->effects : 'rotateX';
			$duration = ( $settings->duration <> '' ) ? $settings->duration : '400';
		?>
		$('.fl-node-<?php echo $id; ?> .posts-items').mixItUp({
			animation: {
				effects: 'fade <?php echo $effects; ?>',
				duration: <?php echo $duration; ?>
			}
		});
	});
})(jQuery);