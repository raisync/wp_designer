<div class="map-advanced">
	<?php
		$address = $settings->address;
		$latLong = getLatLong($address);
		$latitude = $latLong['latitude']?$latLong['latitude']:'Not found';
		$longitude = $latLong['longitude']?$latLong['longitude']:'Not found';
		$height = ( ($settings->height >= 100) && (!empty($settings->height)) ) ? $settings->height : '600';
	?>
	<div class="map-advanced-content" id="map_<?php echo $id; ?>" style=" width: 100%; height: <?php echo $height ?>px;"></div>
</div>