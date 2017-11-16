<div id="divider">
        <?php if ( ( $settings->image_options == 'icon' ) && ( ! empty($settings->icon ) ) ) : ?>
            <i class="icon-lg <?php echo $settings->icon; ?>"></i>
        <?php endif; ?>
        <?php if ( ( $settings->image_options == 'image' ) && ( ! empty($settings->image ) ) ) : 
            $image = $settings->image_src; ?>
            <div class="image">
                <img src="<?php echo $image; ?>" alt="Image Object">
            </div>
        <?php endif; ?>
    <span class="borderline"></span>
</div>