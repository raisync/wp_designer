<?php global $wp_embed;

$output = '<div class="'.$module->get_classname().$colorclass.' owl-carousel">';
	for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
		$bg_image = '';
		if ( ! empty( $settings->items[$i]->slider_bg_image ) ) {
			$bg_image = ' style=" background-image: url('.$settings->items[$i]->slider_bg_image_src.'); "';
		}
        if ( ! empty( $settings->items[$i]->slider_image_object ) ) {
			$image_object = $settings->items[$i]->slider_image_object_src;
		}

		$output .= '<div class="slider-template-bg"'.$bg_image.'>';
				$output .= '<div class="container slider-parallax">';
					$output .= '<div id="slider-template-info-'.$i.'" class="slider-template-info-'.$i.' slider-parallax-text">';
                            if ( ! empty( $settings->items[$i]->slider_pretitle ) ) {
								$desc = '';
								if ( empty( $settings->items[$i]->slider_text ) ) { $desc =' no-desc'; }
								$output .='<h3 class="pretitle animation fl_appear'.$desc.'">'.$settings->items[$i]->slider_pretitle.'</h3>';
							}
							if ( ! empty( $settings->items[$i]->slider_title ) ) {
								$desc = '';
								if ( empty( $settings->items[$i]->slider_text ) ) { $desc =' no-desc'; }
								    $output .='<h2 class="title animation fl_appear'.$desc.'">'.$settings->items[$i]->slider_title.'</h2>';
							}
							if ( ! empty( $settings->items[$i]->slider_text ) ) {
							$output .='<p class="animation fl_top-to-bottom animation-delay-04">';
								$output .= $settings->items[$i]->slider_text;
							$output .='</p>';
							}
						if ( ! empty( $settings->items[$i]->slider_btn_title ) ) {
							$output .='<p class="slider-ui-button-title animation fl_top-to-bottom animation-delay-06">'.$settings->items[$i]->slider_btn_title.'</p>';
						}
						if ( ! empty( $settings->items[$i]->slider_btn_1_link ) ) {
							$output .='<div class="display-inline animation fl_left-to-right animation-delay-10">';
								$output .='<a class="slider-ui-button highlight" data-toggle="modal" data-target="#inquireNowModal" href="'.$settings->items[$i]->slider_btn_1_link.'" title="'.$settings->items[$i]->slider_btn_1_label.'">'.$settings->items[$i]->slider_btn_1_label.'</a>';
							$output .='</div>';							
						}
						if ( ! empty( $settings->items[$i]->slider_btn_2_link ) ) {
							$output .='<div class="display-inline animation fl_right-to-left animation-delay-10">';
								$output .='<a class="slider-ui-button" href="'.$settings->items[$i]->slider_btn_2_link.'" title="'.$settings->items[$i]->slider_btn_2_label.'">'.$settings->items[$i]->slider_btn_2_label.'</a>';
							$output .='</div>';
						}
                        
					$output .= '</div>';
				$output .= '</div>';
                        
                        
		$output .= '</div>';
	endfor;
$output .= '</div>';
$output .= '</div>';
// Modal for Inquire Now Button
$output .= '<div id="inquireNowModal" class="inquireNowModal modal fade" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button class="close" type="button" data-dismiss="modal"><span>X</span></button>
                            <h3 class="modal-title">Inquire Now!</h3>
                        </div>
                        <div class="modal-body">'.do_shortcode('[gravityform id="2" title="false" description="false" ajax="true" tabindex="true"]').'</div>                       
                    </div>
                </div>
            </div>';	
echo $output;

?>