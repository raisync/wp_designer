<?php
$btn_icon = $icon_before = $icon_after = $nofollow = '';
$btn_icon_secondary = $icon_before_secondary = $icon_after_secondary = $nofollow_secondary = '';

$customheight_style = '';
if ( $settings->height == 'customheight' ) {
	$customheight_style = ' style=" height:'.$settings->customheight.'px;"';
}
$output = '<div class="'.$module->get_classname().' '.$settings->style.'"'.$customheight_style.'>';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$output .= '<div class="slider-flickity-item '.$settings->items[$i]->slide_effect.' slider-item-'.($i+1).'">';
			if ( !empty( $settings->items[$i]->slider_bg_image ) ) {
				$output .= '<div class="slider-flickity-bg" style="background-image: url('.$settings->items[$i]->slider_bg_image_src.');"></div>';
			}
			$mobile_centered = '';
			if ( !empty( $settings->items[$i]->mobile_target_centered ) ) {
				$mobile_centered = ' mobile-centered';
			}
			$output .= '<div class="slider-flickity-info">';
				$output .= '<div class="slider-flickity-info-inner'.$settings->items[$i]->content_aligment.$settings->items[$i]->content_aligment_horizontal.$mobile_centered.'">';
                    
					if ( !empty( $settings->items[$i]->slider_title ) ) {
						$output .= '<h2 class="title">'.$settings->items[$i]->slider_title.'</h2>';
					}
					if ( !empty( $settings->items[$i]->slider_description ) ) {
						$output .= '<p class="desc">'.$settings->items[$i]->slider_description.'</p>';
					}

					if ( !empty( $settings->items[$i]->btn_link ) || !empty( $settings->items[$i]->btn_link_secondary ) ) {
						$output .='<div class="slide-btn">';
						if ( !empty( $settings->items[$i]->btn_link ) ) {
							$nofollow = $icon_before = $icon_after = '';
							$btn_icon = 'btn-icon ';
							if ( $settings->items[$i]->btn_link_nofollow == 'yes' ) { 
								$nofollow = ' rel="nofollow"';
							}
							if ( !empty( $settings->items[$i]->btn_icon ) ) { 
								if ('before' == $settings->items[$i]->btn_icon_position) {
									$icon_before = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
								} else if ('after' == $settings->items[$i]->btn_icon_position) {
									$icon_after = '<i class="'.$settings->items[$i]->btn_icon.'"></i>';
								}
							}
							$output .='<a class="btn-first btn-'.$i.' btn '.$btn_icon.$settings->items[$i]->btn_type.$settings->items[$i]->btn_icon_animation.$settings->items[$i]->btn_style.$settings->items[$i]->btn_bg_gradient_border.$settings->items[$i]->btn_effects.' '.$settings->btn_size.$settings->btn_corners.$settings->btn_width.'" href="'.$settings->items[$i]->btn_link.'" target="'.$settings->items[$i]->btn_link_target.'" role="button"'.$nofollow.'>';
								$output .=$icon_before.'<span>'.$settings->items[$i]->btn_text.'</span>'.$icon_after;
							$output .='</a>';
						}
						if ( !empty( $settings->items[$i]->btn_link_secondary ) ) {
							$icon_before_secondary = $icon_after_secondary = '';
							$btn_icon_secondary = 'btn-icon ';
							if ( !empty( $settings->items[$i]->btn_icon_secondary ) ) { 
								if ('before' == $settings->items[$i]->btn_icon_position_secondary) {
									$icon_before_secondary = '<i class="'.$settings->items[$i]->btn_icon_secondary.'"></i>';
								} else if ('after' == $settings->items[$i]->btn_icon_position_secondary) {
									$icon_after_secondary = '<i class="'.$settings->items[$i]->btn_icon_secondary.'"></i>';
								}
							}
							$output .='<a class="btn-second btn-'.$i.' btn '.$btn_icon_secondary.$settings->items[$i]->btn_type_secondary.$settings->items[$i]->btn_icon_animation_secondary.$settings->items[$i]->btn_style_secondary.$settings->items[$i]->btn_bg_gradient_border_secondary.$settings->items[$i]->btn_effects_secondary.' '.$settings->btn_size.$settings->btn_corners.$settings->btn_width.'" href="'.$settings->items[$i]->btn_link_secondary.'" target="'.$settings->items[$i]->btn_link_target_secondary.'" role="button"'.$nofollow.'>';
								$output .=$icon_before_secondary.'<span>'.$settings->items[$i]->btn_text_secondary.'</span>'.$icon_after_secondary;
							$output .='</a>';
						}
						$output .='</div>';
					}

				$output .= '</div>';
			$output .= '</div>';
		$output .= '</div>';
	endfor;
$output .= '</div>';
echo $output;
?>