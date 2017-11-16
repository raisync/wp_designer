(function($) {
	$(function() {
		<?php
			$address = $settings->address;
			$latLong = getLatLong($address);
			$latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
			$longitude = $latLong['longitude']?$latLong['longitude']:'Not found';
			
			global $themeDIR;
			$themeDIR_Includes = FL_MODULE_THEME_URL.'/modules/'.$themeDIR.'/map-advanced/includes/';

			$zoom = $settings->zoom ? $settings->zoom : '15';
			$map_color = '['.$settings->map_color.']';
		?>
		function initialize() {
			var index=0;
			var mapOptions = {
				zoom: <?php echo $zoom; ?>,
				center: new google.maps.LatLng(<?php echo $latitude; ?>,<?php echo $longitude; ?>),
				mapTypeId: google.maps.MapTypeId.ROADMAP,
				scrollwheel: false,
				<?php if ($settings->map_color <> '') { ?>
				styles: <?php echo $map_color;?>
				<?php } ?>
			};
			map = new google.maps.Map(document.getElementById('map_<?php echo $id; ?>'), mapOptions);
			marker=new google.maps.Marker({
				position:map.getCenter(),
				map:map,
				optimized:false,
				icon:'<?php echo ( $settings->marker <> '' ) ? $settings->marker_src : $themeDIR_Includes.'marker.png'; ?>',
				<?php if ($settings->marker_animation == 'yes') { ?>
				animation: google.maps.Animation.BOUNCE,
				<?php } else { ?>
				animation: google.maps.Animation.DROP,
				<?php } ?>
			})
        	marker.addListener('click', toggleBounce);

			google.maps.event.addListener(marker,'mouseover',function(){
				$('img[src="'+this.icon+'"]').addClass('animate');
			});
			google.maps.event.addListener(marker,'mouseout',function(){
				$('img[src="'+this.icon+'"]').removeClass('animate');
			});

		}

		function toggleBounce() {
			if (marker.getAnimation() !== null) {
			  marker.setAnimation(null);
			} else {
			  marker.setAnimation(google.maps.Animation.BOUNCE);
			}
		}

		$( '.fl-builder-content' ).on( 'fl-builder.preview-rendered', initialize() );
		google.maps.event.addDomListener(window, "resize", function() {
			var center = map.getCenter();
			google.maps.event.trigger(map, "resize");
			map.setCenter(center);
		});
	});
})(jQuery);