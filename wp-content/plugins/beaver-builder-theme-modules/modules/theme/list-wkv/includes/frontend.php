<?php global $wp_embed;
//$src = $module->get_src();

if ( $settings->photo_source == 'library'  ) {
   $src = $settings->photo_src;
}
else if ( $settings->photo_source == 'url'  ) {
   $src = $settings->photo_url;
}

$output .= '<div id="lists">';
    
//    $output .= '<div class="container">';
//        $output .= '<div class="row">';

            for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;

                $output .= '<div class="col-md-'.$settings->columns.' item">';
                    $output .= '<div class="list-item-'.$i.' list-text">';
                        if ( ( $settings->items[$i]->image_options == 'icon' ) && ( ! empty($settings->items[$i]->icon ) ) ) {
                            $output .= '<i class="icon-lg '.$settings->items[$i]->icon.'"></i> ';
                        }
                        else if ( ( $settings->items[$i]->image_options == 'image' ) && ( ! empty($settings->items[$i]->image ) ) ) {
                            $image = $settings->items[$i]->image_src;
                            $output .= '<div class="image">';
                                $output .= '<img src="'.$image.'" alt="Image Object">';
                            $output .= '</div>';
                        }

                        $output .= '<div class="list-item-content">';
                            if ( ! empty( $settings->items[$i]->title ) ) {
                                $output .='<h2 class="title animation fl_appear">'.$settings->items[$i]->title.'</h2>';
                            }
                            if ( ! empty( $settings->items[$i]->excerpt ) ) {
                                if ( ! empty( $settings->str_limit ) ) {
                                    $output .='<p class="excerpt animation fl_appear">'.substr($settings->items[$i]->excerpt, 0, $settings->str_limit);
                                    if ( strlen($settings->items[$i]->excerpt) >= $settings->str_limit ) {
                                        $output .='...';
                                    }
                                    $output .='</p>';
                                } else {
                                    $output .='<p class="excerpt animation fl_appear">'.$settings->items[$i]->excerpt.'</p>';
                                }
                            }
                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';

            endfor;
//        $output .= '</div></div>';
//        $output .= '</div>';
$output .= '</div>';
echo $output;

?>