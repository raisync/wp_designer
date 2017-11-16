<?php global $wp_embed;
//$src = $module->get_src();

if ( $settings->photo_source == 'library'  ) {
   $src = $settings->photo_src;
}
else if ( $settings->photo_source == 'url'  ) {
   $src = $settings->photo_url;
}

$output .= '<div id="buttons">';
    
//    $output .= '<div class="container">';
//        $output .= '<div class="row">';

            for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
                
                $output .= '<a href="'.$settings->items[$i]->button_link.'" class="button-link">';
                    $output .= '<div class="col-md-'.$settings->columns.' button">';
                    $output .= '<div class="button-item">';
                        $output .= '<div class="button-item-'.$i.' button-text">';
                                if ( ( $settings->items[$i]->image_options == 'icon' ) && ( ! empty($settings->items[$i]->icon ) ) ) {
                                    $output .= '<i class="icon-lg '.$settings->items[$i]->icon.'"></i> ';
                                }
                                else if ( ( $settings->items[$i]->image_options == 'image' ) && ( ! empty($settings->items[$i]->image ) ) ) {
                                    $image = $settings->items[$i]->image_src;
                                    $output .= '<div class="image">';
                                        $output .= '<img src="'.$image.'" alt="Image Object">';
                                    $output .= '</div>';
                                }

                            $output .= '<div class="button-item-content">';
                                if ( ! empty( $settings->items[$i]->title ) ) {
                                    $output .='<h2 class="title animation fl_appear">'.$settings->items[$i]->title.'</h2>';
                                }
                            $output .= '</div>';
                        $output .= '</div>';
                    $output .= '</div>';
                    $output .= '</div>';
                $output .= '</a>';

            endfor;
//        $output .= '</div></div>';
//        $output .= '</div>';
$output .= '</div>';
echo $output;

?>