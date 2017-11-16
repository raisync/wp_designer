<?php global $wp_embed;
//$src = $module->get_src();

if ( $settings->photo_source == 'library'  ) {
   $src = $settings->photo_src;
}
else if ( $settings->photo_source == 'url'  ) {
   $src = $settings->photo_url;
}

//$output .= '<div id="icon-set">';
//    
//    $output .= '<div class="container">';
//        $output .= '<div class="row">';
//
//        $output .= '<h2 class="fl-heading alignment">';
//            if ( !empty($settings->link) ) {
//                $output .= '<a href="'.$settings->link.'" title="'.$settings->heading.'" target="'.$settings->link_target.'">';
//            }
//            $output .= '<span class="fl-heading-text">'.$settings->heading.'</span>';
//            if ( !empty($settings->link) ) {
//                $output .= '</a>';
//            }
//        $output .= '</h2>';
//
//        $output .= '<h3 class="fl-subheading alignment">';
//            $output .= '<span class="fl-subheading-text">'.$settings->subheading.'</span>';
//        $output .= '</h3>';
//
//            for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;
//
//                $output .= '<div class="col-md-'.$settings->columns.' item">';
//                    $output .= '<div class="icon-set-item-'.$i.' icon-set-text">';
//                        if ( ( $settings->items[$i]->image_options == 'icon' ) && ( ! empty($settings->items[$i]->icon ) ) ) {
//                            $output .= '<i class="icon-lg '.$settings->items[$i]->icon.'"></i> ';
//                        }
//                        else if ( ( $settings->items[$i]->image_options == 'image' ) && ( ! empty($settings->items[$i]->image ) ) ) {
//                            $image = $settings->items[$i]->image_src;
//                            $output .= '<div class="image">';
//                                $output .= '<img src="'.$image.'" alt="Image Object">';
//                            $output .= '</div>';
//                        }
//
//                        $output .= '<div class="icon-set-item-content">';
//                            if ( ! empty( $settings->items[$i]->title ) ) {
//                                $output .='<h3 class="title animation fl_appear">'.$settings->items[$i]->title.'</h2>';
//                            }
//                            if ( ! empty( $settings->items[$i]->excerpt ) ) {
//                                if ( ! empty( $settings->str_limit ) ) {
//                                    $output .='<p class="excerpt animation fl_appear">'.substr($settings->items[$i]->excerpt, 0, $settings->str_limit);
//                                    if ( strlen($settings->items[$i]->excerpt) >= $settings->str_limit ) {
//                                        $output .='...';
//                                    }
//                                    $output .='</p>';
//                                } else {
//                                    $output .='<p class="excerpt animation fl_appear">'.$settings->items[$i]->excerpt.'</p>';
//                                }
//                            }
//                        $output .= '</div>';
//                    $output .= '</div>';
//                $output .= '</div>';
//
//            endfor;
//        $output .= '</div></div>';
//    $output .= '<div class="bg-img" style="background: url('.$src.') no-repeat; background-size: cover; background-position: center center;">';
//    $output .= '</div>';
//$output .= '</div>';
//echo $output;


//------------------------------------------------------------------------------------------------------------------------------

$output .= '<div id="blurb-set">';
    
    $output .= '<div class="container">';
        $output .= '<div class="row">';

            for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue;

            $output .= '<div class="col-md-'.$settings->columns.'">';
            $output .= '<div id="blurb">';
                $output .= '<div class="fl-blurb">';
                    $output .= '<div class="fl-photo' . ( ! empty( $settings->crop ) ? ' fl-photo-crop-'.$settings->crop : ' None') . ' fl-photo-align-' . $settings->align . '" itemscope itemtype="http://schema.org/ImageObject">';
                        $output .= '<div class="fl-photo-content fl-photo-img-'.$filetype.'">';
                            if(!empty($link)) {
                                $output .= '<a href="'.$link.'" target="'.$settings->link_target.'" itemprop="url">';
                            }
                            $output .= '<img class="'.$classes.'" src="'.$src.'" alt="'.$alt.'" itemprop="image" '.$attrs.' />';
                            if(!empty($link)) {
                                $output .= '</a>';
                            } 
                            if($photo && !empty($photo->caption) && 'hover' == $settings->show_caption) {
                                $output .= '<div class="fl-photo-caption fl-photo-caption-hover" itemprop="caption">'.$photo->caption.'</div>';
                            }
                        $output .= '</div>';
                        if($photo && !empty($photo->caption) && 'below' == $settings->show_caption) {
                            $output .= '<div class="fl-photo-caption fl-photo-caption-below" itemprop="caption">'.$photo->caption.'</div>';
                        }
                    $output .= '</div>';

                    $output .= '<div class="blurb-number">';
                        $output .= '<h3>';
                            if ( ( $settings->image_options == 'icon' ) && ( ! empty($settings->icon ) ) ) {
                                $output .= '<span><i class="icon-lg '.$settings->icon.'"></i></span>';
                            }
                            else if ( ( $settings->image_options == 'image' ) && ( ! empty($settings->image ) ) ) {
                                $image = $settings->image_src;
                                $output .= '<span class="image">';
                                    $output .= '<img src="'.$image.'" alt="Image Object">';
                                $output .= '</span>';
                            }
                            else if ( ( $settings->image_options == 'text' ) && ( ! empty($settings->text ) ) ) {
                                $output .= '<span>'.$settings->prelabel.'</span>';
                            }
                        $output .= '</h3>';
                    $output .= '</div>';

                $output .= '</div>';

                $output .= '<div class="blurb-content">';
                    $output .= '<'.$settings->tag.' class="fl-heading">';
                        if(!empty($settings->link)) {
                            $output .= '<a href="'.$settings->link.'" title="'.$settings->heading.'" target="'.$settings->link_target.'">';
                        }
                        $output .= '<span class="fl-heading-text">'.$settings->heading.'</span>';
                        if(!empty($settings->link)) {
                        $output .= '</a>';
                        }
                    $output .= '</'.$settings->tag.'>';

                    $output .= '<div class="fl-blurb-content">';
                        $output .= '<span>'.$settings->blurb_content.'</span>';
                    $output .= '</div>';

                $output .= '</div></div>';
            $output .= '</div>';

            endfor;

    $output .= '</div></div>';
$output .= '</div>';
echo $output;

?>