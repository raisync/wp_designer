<div id="blurb" style="background: url(<?php echo $settings->photo_src; ?>) no-repeat; background-size: cover;">

    <div class="blurb-content">
        <?php if($settings->show_label == 'true') : ?>
        <div class="blurb-number">
            <h3>
                <?php 
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
                    $output .= '<span>'.$settings->text.'</span>';
                }
                echo $output;
                ?>
                
            </h3>
        </div>
        <?php endif; ?>
        
        <div class="blurb-text">
            <<?php echo $settings->tag; ?> class="heading-title">
                <?php if(!empty($settings->link)) : ?>
                <a href="<?php echo $settings->link; ?>" title="<?php echo $settings->heading; ?>" target="<?php echo $settings->link_target; ?>">
                <?php endif; ?>
                <span class="heading-title-text"><?php echo $settings->heading; ?></span>
                <?php if(!empty($settings->link)) : ?>
                </a>
                <?php endif; ?>
            </<?php echo $settings->tag; ?>>

            <div class="blurb-content-text">
                <p><?php echo $settings->blurb_content; ?></p>
            </div>
        </div>

    </div>
</div>