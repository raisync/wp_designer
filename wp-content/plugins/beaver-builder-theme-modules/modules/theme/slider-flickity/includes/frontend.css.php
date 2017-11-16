h2#powerful > span:before {
    background-image: url(<?php echo $module->url.'img/ic_cctv.svg'; ?>);
}

<?php if ( !empty($settings->bg_color) ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity {
		background-color: #<?php echo $settings->bg_color; ?>;
	}
<?php } ?>


<?php //NAV ?>
<?php if ( !empty($settings->nav_color) || $settings->nav_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-prev-next-button {
		<?php if ( $settings->nav_color <> '' ) { ?>
			color: #<?php echo $settings->nav_color; ?>;
		<?php } ?>
		<?php if ( $settings->nav_size <> '' ) { ?>
			width: <?php echo $settings->nav_size; ?>px;
			height: <?php echo $settings->nav_size; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( $settings->nav_thick <> '' || $settings->nav_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-prev-next-button.previous:before {
		<?php if ( $settings->nav_thick <> '' ) { ?>
			border-left-width: <?php echo $settings->nav_thick; ?>px;
			border-bottom-width: <?php echo $settings->nav_thick; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_spacing <> '' ) { ?>
			left: <?php echo $settings->nav_spacing; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( $settings->nav_thick <> '' || $settings->nav_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-prev-next-button.next:before {
		<?php if ( $settings->nav_thick <> '' ) { ?>
			border-right-width: <?php echo $settings->nav_thick; ?>px;
			border-top-width: <?php echo $settings->nav_thick; ?>px;
		<?php } ?>
		<?php if ( $settings->nav_spacing <> '' ) { ?>
			right: <?php echo $settings->nav_spacing; ?>px;
		<?php } ?>
	}
<?php } ?>

<?php //DOTS ?>
<?php if ( $settings->dots_align <> '' || $settings->dots_bottom <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-page-dots {
		<?php if ( $settings->dots_align <> '' ) { ?>
			text-align: <?php echo $settings->dots_align; ?>;
		<?php } ?>
		<?php if ( $settings->dots_bottom <> '' ) { ?>
			bottom: <?php echo $settings->dots_bottom; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( !empty($settings->dots_color) || $settings->dots_size <> '' || $settings->dots_spacing <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-page-dots .dot {
		<?php if (!empty($settings->dots_color) ) { ?>
			background-color: #<?php echo $settings->dots_color; ?>;
		<?php } ?>
		<?php if ( $settings->dots_size <> '' ) { ?>
			width: <?php echo $settings->dots_size; ?>px;
			height: <?php echo $settings->dots_size; ?>px;
			border-radius: <?php echo $settings->dots_size; ?>px;
			-webkit-border-radius: <?php echo $settings->dots_size; ?>px;
		<?php } ?>
		<?php if ( $settings->dots_spacing <> '' ) { ?>
			margin-left: <?php echo $settings->dots_spacing; ?>px;
			margin-right: <?php echo $settings->dots_spacing; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( $settings->dots_size <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-page-dots .dot::before {
		<?php if ( $settings->dots_size <> '' ) { ?>
			border-radius: <?php echo $settings->dots_size; ?>px;
			-webkit-border-radius: <?php echo $settings->dots_size; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( $settings->dots_active_width <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-page-dots .dot.is-selected {
		<?php if ( $settings->dots_active_width <> '' ) { ?>
			width: <?php echo $settings->dots_active_width; ?>px;
		<?php } ?>
	}
<?php } ?>
<?php if ( $settings->dots_opacity <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .slider-flickity .flickity-page-dots .dot:not(.is-selected) {
		<?php if ( $settings->dots_opacity <> '' ) { ?>
			opacity: <?php echo $settings->dots_opacity; ?>;
		<?php } ?>
	}
<?php } ?>




<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>

	<?php // SLIDER IMAGE ?>
	<?php if ( !empty($settings->items[$i]->slider_bg_color) ) { ?>
		.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> {
			background-color: #<?php echo $settings->items[$i]->slider_bg_color; ?>;
		}
	<?php } ?>
	<?php if ( $settings->items[$i]->slider_bg_image_opacity <> '' || $settings->items[$i]->slider_bg_image_position <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .slider-flickity-bg {
		<?php if ( $settings->items[$i]->slider_bg_image_position <> '' ) { ?>
			background-position: <?php echo $settings->items[$i]->slider_bg_image_position; ?>;
		<?php } ?>
		<?php if ( $settings->items[$i]->slider_bg_image_opacity <> '' ) { ?>
			opacity: <?php echo $settings->items[$i]->slider_bg_image_opacity/100; ?>;
		<?php } ?>
		}
	<?php } ?>

	<?php // SLIDER EFFECTS ?>
	<?php if ( $settings->items[$i]->slide_effect == 'effect-top-bottom' || $settings->items[$i]->slide_effect == 'effect-top' ) { ?>
		<?php if ( !empty($settings->items[$i]->slide_effect_top_color) ) { ?>
			.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?>.slider-flickity-item::before { 
				background:    -moz-linear-gradient(top,  		rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,0) 40%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,0) 100%);
				background: -webkit-linear-gradient(top,  		rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,0) 40%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,0) 100%);
				background: 		linear-gradient(to bottom,  rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,1) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,0) 40%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>,0) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e6<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>', endColorstr='#00<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_top_color)) ?>',GradientType=0 );
			}
		<?php } ?>
	<?php } ?>
	<?php if ( $settings->items[$i]->slide_effect == 'effect-top-bottom' || $settings->items[$i]->slide_effect == 'effect-bottom' ) { ?>
		<?php if ( !empty($settings->items[$i]->slide_effect_bottom_color) ) { ?>
			.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?>.slider-flickity-item::after { 
				background:    -moz-linear-gradient(top,  		rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0) 50%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0.9) 100%);
				background: -webkit-linear-gradient(top,  		rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0) 50%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0.9) 100%);
				background: 		linear-gradient(to bottom,  rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0) 0%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0) 50%, rgba(<?php echo implode(',', FLBuilderColor::hex_to_rgb($settings->items[$i]->slide_effect_bottom_color)) ?>,0.9) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#00<?php echo $settings->items[$i]->items[$i]->slide_effect_bottom_color; ?>', endColorstr='#e6<?php echo $settings->items[$i]->items[$i]->slide_effect_bottom_color; ?>',GradientType=0 );
			}
		<?php } ?>
	<?php } ?>


	<?php // SLIDER TITLE ?>
	<?php 
		if ( 
			!empty($settings->items[$i]->title_color) 	||
			$settings->items[$i]->title_size <> '' 		||
			$settings->items[$i]->title_spacing <> '' 	||
			$settings->items[$i]->title_lineheight <> ''||
			$settings->items[$i]->title_transform <> '' ||
			$settings->items[$i]->title_weight <> '' 	||
			$settings->items[$i]->title_width <> ''
		) { ?>
		.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .title {
			<?php if ( !empty($settings->items[$i]->title_color) ) { ?>color: #<?php echo $settings->items[$i]->title_color; ?>; <?php } ?>
			<?php if ( $settings->items[$i]->title_size <> '' ) { ?>font-size: <?php echo $settings->items[$i]->title_size; ?>px; <?php } ?>
			<?php if ( $settings->items[$i]->title_spacing <> '' ) { ?>margin-bottom: <?php echo $settings->items[$i]->title_spacing; ?>px; <?php } ?>
			<?php if ( $settings->items[$i]->title_lineheight <> '' ) { ?>line-height: <?php echo $settings->items[$i]->title_lineheight; ?>em; <?php } ?>
			<?php if ( $settings->items[$i]->title_transform <> '' ) { ?>text-transform: <?php echo $settings->items[$i]->title_transform; ?>; <?php } ?>
			<?php if ( $settings->items[$i]->title_weight <> '' ) { ?>font-weight: <?php echo $settings->items[$i]->title_weight; ?>; <?php } ?>
			<?php if ( $settings->items[$i]->title_width <> '' ) { ?>max-width: <?php echo $settings->items[$i]->title_width; ?>%; <?php } ?>
		}
	<?php } ?>


	<?php // SLIDER DESC ?>
	<?php 
		if ( 
			!empty($settings->items[$i]->desc_color) 	||
			$settings->items[$i]->desc_size <> '' 		||
			$settings->items[$i]->desc_spacing <> '' 	||
			$settings->items[$i]->desc_lineheight <> ''	||
			$settings->items[$i]->desc_transform <> '' 	||
			$settings->items[$i]->desc_weight <> '' 	||
			$settings->items[$i]->desc_width <> ''
		) { ?>
		.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .desc {
			<?php if ( !empty($settings->items[$i]->desc_color) ) { ?>color: #<?php echo $settings->items[$i]->desc_color; ?>; <?php } ?>
			<?php if ( $settings->items[$i]->desc_size <> '' ) { ?>font-size: <?php echo $settings->items[$i]->desc_size; ?>px; <?php } ?>
			<?php if ( $settings->items[$i]->desc_spacing <> '' ) { ?>margin-bottom: <?php echo $settings->items[$i]->desc_spacing; ?>px; <?php } ?>
			<?php if ( $settings->items[$i]->desc_lineheight <> '' ) { ?>line-height: <?php echo $settings->items[$i]->desc_lineheight; ?>em; <?php } ?>
			<?php if ( $settings->items[$i]->desc_transform <> '' ) { ?>text-transform: <?php echo $settings->items[$i]->desc_transform; ?>; <?php } ?>
			<?php if ( $settings->items[$i]->desc_weight <> '' ) { ?>font-weight: <?php echo $settings->items[$i]->desc_weight; ?>; <?php } ?>
			<?php if ( $settings->items[$i]->desc_width <> '' ) { ?>max-width: <?php echo $settings->items[$i]->desc_width; ?>%; <?php } ?>
		}
	<?php } ?>

	<?php // SLIDER CONTENT ALIGMENT ?>
	<?php if ( $settings->items[$i]->content_aligment <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .slider-flickity-info-inner {
			<?php if ( $settings->items[$i]->content_aligment <> '' ) { ?> vertical-align: <?php echo $settings->items[$i]->content_aligment; ?>; <?php } ?>
		}
	<?php } ?>



	<?php // SLIDER CONTENT PADDING
	if ( 
		$settings->items[$i]->padding_top <> ''		||
		$settings->items[$i]->padding_bottom <> ''	||
		$settings->items[$i]->padding_left <> ''	||
		$settings->items[$i]->padding_right <> ''
	   ) { ?>
			.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .slider-flickity-info-inner {
				<?php if ( $settings->items[$i]->padding_top <> '' ) { ?> padding-top: <?php echo $settings->items[$i]->padding_top; ?>px;<?php } ?>
				<?php if ( $settings->items[$i]->padding_bottom <> '' ) { ?> padding-bottom: <?php echo $settings->items[$i]->padding_bottom; ?>px;<?php } ?>
				<?php if ( $settings->items[$i]->padding_left <> '' ) { ?> padding-left: <?php echo $settings->items[$i]->padding_left; ?>px;<?php } ?>
				<?php if ( $settings->items[$i]->padding_right <> '' ) { ?> padding-right: <?php echo $settings->items[$i]->padding_right; ?>px;<?php } ?>
			}
	<?php } ?>



		<?php //RESPONSIVE CSS
		// MEDIUM - GLOBAL SETTING
		$global_settings = FLBuilderModel::get_global_settings(); 
		if ( 
			$settings->items[$i]->title_size_medium <> ''		||
			$settings->items[$i]->desc_size_medium <> ''		||
			
			$settings->items[$i]->title_width_medium <> ''		||
			$settings->items[$i]->desc_width_medium <> ''		||
			
			$settings->items[$i]->title_spacing_medium <> ''	||
			$settings->items[$i]->desc_spacing_medium <> ''		||
			
			$settings->items[$i]->padding_top_medium <> ''		||
			$settings->items[$i]->padding_bottom_medium <> ''	||
			$settings->items[$i]->padding_left_medium <> ''		||
			$settings->items[$i]->padding_right_medium <> ''
		   ) { ?>
			@media only screen and ( max-width: <?php echo $global_settings->medium_breakpoint; ?>px ) {
				<?php if ( $settings->items[$i]->title_size_medium <> '' || $settings->items[$i]->title_spacing_medium <> '' || $settings->items[$i]->title_width_medium <> '' ) {?>
					.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .title {
						<?php if ( $settings->items[$i]->title_size_medium <> '' ) { ?> font-size: <?php echo $settings->items[$i]->title_size_medium; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->title_spacing_medium <> '' ) { ?> margin-bottom: <?php echo $settings->items[$i]->title_spacing_medium; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->title_width_medium <> '' ) { ?>max-width: <?php echo $settings->items[$i]->title_width_medium; ?>%; <?php } ?>
					}
				<?php } ?>
				<?php if ( $settings->items[$i]->desc_size_medium <> '' || $settings->items[$i]->desc_spacing_medium <> '' || $settings->items[$i]->desc_width_medium <> '' ) {?>
					.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .desc {
						<?php if ( $settings->items[$i]->desc_size_medium <> '' ) { ?> font-size: <?php echo $settings->items[$i]->desc_size_medium; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->desc_spacing_medium <> '' ) { ?> margin-bottom: <?php echo $settings->items[$i]->desc_spacing_medium; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->desc_width_medium <> '' ) { ?>max-width: <?php echo $settings->items[$i]->desc_width_medium; ?>%; <?php } ?>
					}
				<?php } ?>
				<?php if ( 
					$settings->items[$i]->padding_top_medium <> ''		||
					$settings->items[$i]->padding_bottom_medium <> ''	||
					$settings->items[$i]->padding_left_medium <> ''		||
					$settings->items[$i]->padding_right_medium <> ''
				) { ?>
					.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .slider-flickity-info-inner {
						<?php if ( $settings->items[$i]->padding_top_medium <> '' ) { ?> padding-top: <?php echo $settings->items[$i]->padding_top_medium; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->padding_bottom_medium <> '' ) { ?> padding-bottom: <?php echo $settings->items[$i]->padding_bottom_medium; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->padding_left_medium <> '' ) { ?> padding-left: <?php echo $settings->items[$i]->padding_left_medium; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->padding_right_medium <> '' ) { ?> padding-right: <?php echo $settings->items[$i]->padding_right_medium; ?>px;<?php } ?>
					}
				<?php } ?>
			}
		<?php } ?>
		<?php 
		// RESPONSIVE - GLOBAL SETTING
		if ( 
			$settings->items[$i]->title_size_responsive <> ''		||
			$settings->items[$i]->desc_size_responsive <> ''		||
			
			$settings->items[$i]->title_width_responsive <> ''		||
			$settings->items[$i]->desc_width_responsive <> ''		||
			
			$settings->items[$i]->title_spacing_responsive <> ''	||
			$settings->items[$i]->desc_spacing_responsive <> ''		||
			
			$settings->items[$i]->padding_top_responsive <> ''		||
			$settings->items[$i]->padding_bottom_responsive <> ''	||
			$settings->items[$i]->padding_left_responsive <> ''		||
			$settings->items[$i]->padding_right_responsive <> ''
		   ) { ?>
			@media only screen and ( max-width: <?php echo $global_settings->responsive_breakpoint; ?>px ) {
				<?php if ( $settings->items[$i]->title_size_responsive <> '' || $settings->items[$i]->title_spacing_responsive <> '' || $settings->items[$i]->title_width_responsive <> '' ) {?>
					.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .title {
						<?php if ( $settings->items[$i]->title_size_responsive <> '' ) { ?> font-size: <?php echo $settings->items[$i]->title_size_responsive; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->title_spacing_responsive <> '' ) { ?> margin-bottom: <?php echo $settings->items[$i]->title_spacing_responsive; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->title_width_responsive <> '' ) { ?>max-width: <?php echo $settings->items[$i]->title_width_responsive; ?>%; <?php } ?>
					}
				<?php } ?>
				<?php if ( $settings->items[$i]->desc_size_responsive <> '' || $settings->items[$i]->desc_spacing_responsive <> '' || $settings->items[$i]->desc_width_responsive <> '' ) {?>
					.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .desc {
						<?php if ( $settings->items[$i]->desc_size_responsive <> '' ) { ?> font-size: <?php echo $settings->items[$i]->desc_size_responsive; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->desc_spacing_responsive <> '' ) { ?> margin-bottom: <?php echo $settings->items[$i]->desc_spacing_responsive; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->desc_width_responsive <> '' ) { ?>max-width: <?php echo $settings->items[$i]->desc_width_responsive; ?>%; <?php } ?>
					}
				<?php } ?>
				<?php if ( 
					$settings->items[$i]->padding_top_responsive <> ''		||
					$settings->items[$i]->padding_bottom_responsive <> ''	||
					$settings->items[$i]->padding_left_responsive <> ''		||
					$settings->items[$i]->padding_right_responsive <> ''
				) { ?>
					.fl-node-<?php echo $id; ?> .slider-item-<?php echo ($i+1); ?> .slider-flickity-info-inner {
						<?php if ( $settings->items[$i]->padding_top_responsive <> '' ) { ?> padding-top: <?php echo $settings->items[$i]->padding_top_responsive; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->padding_bottom_responsive <> '' ) { ?> padding-bottom: <?php echo $settings->items[$i]->padding_bottom_responsive; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->padding_left_responsive <> '' ) { ?> padding-left: <?php echo $settings->items[$i]->padding_left_responsive; ?>px;<?php } ?>
						<?php if ( $settings->items[$i]->padding_right_responsive <> '' ) { ?> padding-right: <?php echo $settings->items[$i]->padding_right_responsive; ?>px;<?php } ?>
					}
				<?php } ?>
			}
		<?php } ?>

<?php endfor; ?>





<?php //BUTTONS
	if (
		$settings->btn_width == ' btn-custom' && 
		$settings->btn_custom_width <> '' || 
		$settings->btn_font_size <> '' ||  
		$settings->btn_padding <> '' || 
		$settings->btn_font_weight <> '' || 
		$settings->btn_padding_vertical <> '' ||
		$settings->btn_border_radius <> '' 
	) { ?>
	.fl-node-<?php echo $id; ?> .btn {
		<?php if ($settings->btn_width == ' btn-custom' && $settings->btn_custom_width <> '' ) { ?>
			min-width: <?php echo $settings->btn_custom_width; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_font_size <> '' ) { ?>
			font-size: <?php echo $settings->btn_font_size; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_font_weight <> '' ) { ?>
			font-weight: <?php echo $settings->btn_font_weight; ?>;
		<?php } ?>
		<?php if ( $settings->btn_padding <> '' ) { ?>
			padding-left: <?php echo $settings->btn_padding; ?>px;
			padding-right: <?php echo $settings->btn_padding; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_padding_vertical <> '' ) { ?>
			padding-top: <?php echo $settings->btn_padding_vertical; ?>px;
			padding-bottom: <?php echo $settings->btn_padding_vertical; ?>px;
		<?php } ?>
		<?php if ( $settings->btn_border_radius <> '' ) { ?>
			border-radius: <?php echo $settings->btn_border_radius; ?>px;
		<?php } ?>
	}
<?php } ?>

<?php if ( $settings->btn_custom_margin <> '' ) { ?>
	.fl-node-<?php echo $id; ?> .btn { margin-bottom: <?php echo $settings->btn_custom_margin; ?>px; margin-right: <?php echo $settings->btn_custom_margin; ?>px; }
	.fl-node-<?php echo $id; ?> .btn:only-child { margin-right: 0; }
	.fl-node-<?php echo $id; ?> .btn.btn-block + .btn.btn-block { margin-right: 0; margin-top: <?php echo $settings->btn_custom_margin; ?>px; }
<?php } ?>

<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>

	<?php if (!empty( $settings->items[$i]->btn_bg_color ) || !empty( $settings->items[$i]->btn_text_color ) || !empty( $settings->items[$i]->btn_border_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .btn-first.btn-<?php echo $i; ?> {
			<?php if ( $settings->items[$i]->btn_style != ' btn-outline' ) { ?>
				<?php if (!empty( $settings->items[$i]->btn_bg_color ) ) { ?>
					background-color: #<?php echo $settings->items[$i]->btn_bg_color; ?>;
				<?php } ?>
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style != '' ) { ?>
				<?php if ( $settings->items[$i]->btn_style == ' btn-flat' ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_bg_color; ?>;
				<?php } else if ( !empty( $settings->items[$i]->btn_border_color ) ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_border_color; ?>;
				<?php } ?>
			<?php } else { ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_color; ?>;
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style == ' btn-gradient' ) { ?>
				<?php $gradient = $gradient_2 = $gradient_3 = ''; ?>
				<?php if ('vertical' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'top'; $gradient_2 = 'bottom'; $gradient_3 = '0';
				} else if ('horizontal' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'left'; $gradient_2 = 'right'; $gradient_3 = '1';
				} ?>
				background: #<?php echo $settings->items[$i]->btn_bg_color; ?>;
				background: -moz-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_color; ?> 0%, #<?php echo $settings->items[$i]->btn_bg_color_2; ?> 100%);
				background: -webkit-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_color_2; ?> 100%);
				background: linear-gradient(to <?php echo $gradient_2; ?>,  #<?php echo $settings->items[$i]->btn_bg_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_color_2; ?> 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->items[$i]->btn_bg_color; ?>', endColorstr='#<?php echo $settings->items[$i]->btn_bg_color_2; ?>',GradientType=<?php echo $gradient_3; ?> );
			<?php } ?>
			<?php if (!empty( $settings->items[$i]->btn_text_color ) ) { ?>
				color: #<?php echo $settings->items[$i]->btn_text_color; ?>;
			<?php }  ?>
		}
	<?php  } ?>
	<?php if ( $settings->items[$i]->btn_effects <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .btn-first.btn-<?php echo $i; ?>::after {
			<?php if ( $settings->items[$i]->btn_style == ' btn-flat' ) { ?>
				border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color <> '' ? $settings->items[$i]->btn_bg_hover_color : $settings->items[$i]->btn_bg_color; ?>;
			<?php } else if ( !empty( $settings->items[$i]->btn_border_color ) ) { ?>
				<?php $border_hover_alt = $settings->items[$i]->btn_border_color <> '' ? $settings->items[$i]->btn_border_color : $settings->items[$i]->btn_bg_color; ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_color <> '' ? $settings->items[$i]->btn_border_color : $border_hover_alt; ?>;
			<?php } ?>
		}
	<?php } ?>




	<?php //HOVER
		if (!empty( $settings->items[$i]->btn_bg_hover_color ) || !empty( $settings->items[$i]->btn_text_hover_color ) || !empty( $settings->items[$i]->btn_border_hover_color ) ) { ?>
		.fl-node-<?php echo $id; ?> .btn-first.btn-<?php echo $i; ?>:hover {
			<?php if ( $settings->items[$i]->btn_style != ' btn-outline' ) { ?>
				<?php if (!empty( $settings->items[$i]->btn_bg_hover_color ) ) { ?>
					background-color: #<?php echo $settings->items[$i]->btn_bg_hover_color; ?>;
				<?php } ?>
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style != '' ) { ?>
				<?php if ( $settings->items[$i]->btn_style == ' btn-flat' ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color; ?>;
				<?php } else if (!empty( $settings->items[$i]->btn_border_hover_color ) ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_border_hover_color; ?>;
				<?php } ?>
			<?php } else { ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_hover_color; ?>;
			<?php } ?>
			<?php if (' btn-gradient' == $settings->items[$i]->btn_style ) { ?>
				<?php $gradient = $gradient_2 = $gradient_3 = ''; ?>
				<?php if ('vertical' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'top'; $gradient_2 = 'bottom'; $gradient_3 = '0';
				} else if ('horizontal' == $settings->items[$i]->btn_bg_gradient_orientation ) {
					$gradient = 'left'; $gradient_2 = 'right'; $gradient_3 = '1';
				} ?>
				background: #<?php echo $settings->items[$i]->btn_bg_hover_color; ?>;
				background: -moz-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color; ?> 0%, #<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?> 100%);
				background: -webkit-linear-gradient(<?php echo $gradient; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?> 100%);
				background: linear-gradient(to <?php echo $gradient_2; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?> 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->items[$i]->btn_bg_hover_color; ?>', endColorstr='#<?php echo $settings->items[$i]->btn_bg_hover_color_2; ?>',GradientType=<?php echo $gradient_3; ?> );
			<?php } ?>
			<?php if (!empty( $settings->items[$i]->btn_text_hover_color ) ) { ?>
				color: #<?php echo $settings->items[$i]->btn_text_hover_color; ?>;
			<?php } ?>
		}
	<?php } ?>







	<?php // SECONDARY ?>
	<?php if (!empty( $settings->items[$i]->btn_bg_color_secondary ) || !empty( $settings->items[$i]->btn_text_color_secondary ) || !empty( $settings->items[$i]->btn_border_color_secondary ) ) { ?>
		.fl-node-<?php echo $id; ?> .btn-second.btn-<?php echo $i; ?> {
			<?php if ( $settings->items[$i]->btn_style_secondary != ' btn-outline' ) { ?>
				<?php if (!empty( $settings->items[$i]->btn_bg_color_secondary ) ) { ?>
					background-color: #<?php echo $settings->items[$i]->btn_bg_color_secondary; ?>;
				<?php } ?>
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style_secondary != '' ) { ?>
				<?php if ( $settings->items[$i]->btn_style_secondar == ' btn-flat' ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_bg_color_secondary; ?>;
				<?php } else if (!empty( $settings->items[$i]->btn_border_color_secondary ) ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_border_color_secondary; ?>;
				<?php } ?>
			<?php } else { ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_color_secondary; ?>;
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style_secondary == ' btn-gradient' ) { ?>
				<?php $gradient_secondary = $gradient_2_secondary = $gradient_3_secondary = ''; ?>
				<?php if ('vertical' == $settings->items[$i]->btn_bg_gradient_orientation_secondary ) {
					$gradient_secondary = 'top'; $gradient_2_secondary = 'bottom'; $gradient_3_secondary = '0';
				} else if ('horizontal' == $settings->items[$i]->btn_bg_gradient_orientation_secondary ) {
					$gradient_secondary = 'left'; $gradient_2_secondary = 'right'; $gradient_3_secondary = '1';
				} ?>
				background: #<?php echo $settings->items[$i]->btn_bg_color_secondary; ?>;
				background: -moz-linear-gradient(<?php echo $gradient_secondary; ?>,  #<?php echo $settings->items[$i]->btn_bg_color_secondary; ?> 0%, #<?php echo $settings->items[$i]->btn_bg_color_2_secondary; ?> 100%);
				background: -webkit-linear-gradient(<?php echo $gradient_secondary; ?>,  #<?php echo $settings->items[$i]->btn_bg_color_secondary; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_color_2_secondary; ?> 100%);
				background: linear-gradient(to <?php echo $gradient_2_secondary; ?>,  #<?php echo $settings->items[$i]->btn_bg_color_secondary; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_color_2_secondary; ?> 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->items[$i]->btn_bg_color_secondary; ?>', endColorstr='#<?php echo $settings->items[$i]->btn_bg_color_2_secondary; ?>',GradientType=<?php echo $gradient_3_secondary; ?> );
			<?php } ?>
			<?php if (!empty( $settings->items[$i]->btn_text_color_secondary ) ) { ?>
				color: #<?php echo $settings->items[$i]->btn_text_color_secondary; ?>;
			<?php }  ?>
		}
	<?php  } ?>
	<?php if ( $settings->items[$i]->btn_effects_secondary <> '' ) { ?>
		.fl-node-<?php echo $id; ?> .btn-second.btn-<?php echo $i; ?>::after {
			<?php if ( $settings->items[$i]->btn_style_secondary == ' btn-flat' ) { ?>
				border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color_secondary <> '' ? $settings->items[$i]->btn_bg_hover_color_secondary : $settings->items[$i]->btn_bg_color_secondary; ?>;
			<?php } else if ( !empty( $settings->items[$i]->btn_border_color_secondary ) ) { ?>
				<?php $border_hover_alt_secondary = $settings->items[$i]->btn_border_color_secondary <> '' ? $settings->items[$i]->btn_border_color_secondary : $settings->items[$i]->btn_bg_color_secondary; ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_color_secondary <> '' ? $settings->items[$i]->btn_border_color_secondary : $border_hover_alt_secondary; ?>;
			<?php } ?>
		}
	<?php } ?>

	<?php if (!empty( $settings->items[$i]->btn_bg_hover_color_secondary ) || !empty( $settings->items[$i]->btn_text_hover_color_secondary ) || !empty( $settings->items[$i]->btn_border_hover_color_secondary ) ) { ?>
		.fl-node-<?php echo $id; ?> .btn-second.btn-<?php echo $i; ?>:hover {
			<?php if ( $settings->items[$i]->btn_style_secondary != ' btn-outline' ) { ?>
				<?php if (!empty( $settings->items[$i]->btn_bg_hover_color_secondary ) ) { ?>
					background-color: #<?php echo $settings->items[$i]->btn_bg_hover_color_secondary; ?>;
				<?php } ?>
			<?php } ?>
			<?php if ( $settings->items[$i]->btn_style_secondary != '' ) { ?>
				<?php if ( $settings->items[$i]->btn_style_secondary == ' btn-flat' ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_bg_hover_color_secondary; ?>;
				<?php } else if (!empty( $settings->items[$i]->btn_border_hover_color_secondary ) ) { ?>
					border-color: #<?php echo $settings->items[$i]->btn_border_hover_color_secondary; ?>;
				<?php } ?>
			<?php } else { ?>
				border-color: #<?php echo $settings->items[$i]->btn_border_hover_color_secondary; ?>;
			<?php } ?>
			<?php if (' btn-gradient' == $settings->items[$i]->btn_style_secondary ) { ?>
				<?php $gradient_secondary = $gradient_2_secondary = $gradient_3_secondary = ''; ?>
				<?php if ('vertical' == $settings->items[$i]->btn_bg_gradient_orientation_secondary ) {
					$gradient_secondary = 'top'; $gradient_2_secondary = 'bottom'; $gradient_3_secondary = '0';
				} else if ('horizontal' == $settings->items[$i]->btn_bg_gradient_orientation_secondary ) {
					$gradient_secondary = 'left'; $gradient_2_secondary = 'right'; $gradient_3_secondary = '1';
				} ?>
				background: #<?php echo $settings->items[$i]->btn_bg_hover_color_secondary; ?>;
				background: -moz-linear-gradient(<?php echo $gradient_secondary; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color_secondary; ?> 0%, #<?php echo $settings->items[$i]->btn_bg_hover_color_2_secondary; ?> 100%);
				background: -webkit-linear-gradient(<?php echo $gradient_secondary; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color_secondary; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_hover_color_2_secondary; ?> 100%);
				background: linear-gradient(to <?php echo $gradient_2_secondary; ?>,  #<?php echo $settings->items[$i]->btn_bg_hover_color_secondary; ?> 0%,#<?php echo $settings->items[$i]->btn_bg_hover_color_2_secondary; ?> 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#<?php echo $settings->items[$i]->btn_bg_hover_color_secondary; ?>', endColorstr='#<?php echo $settings->items[$i]->btn_bg_hover_color_2_secondary; ?>',GradientType=<?php echo $gradient_3_secondary; ?> );
			<?php } ?>
			<?php if (!empty( $settings->items[$i]->btn_text_hover_color_secondary ) ) { ?>
				color: #<?php echo $settings->items[$i]->btn_text_hover_color_secondary; ?>;
			<?php } ?>
		}
	<?php } ?>

<?php endfor; ?>