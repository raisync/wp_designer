.fl-node-<?php echo $id; ?> {
	padding-top: <?php echo $settings->padding_top; ?>px;
	padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	padding-left: <?php echo $settings->padding_left; ?>px;
	padding-right: <?php echo $settings->padding_right; ?>px;
}

.fl-node-<?php echo $id; ?> .partner-gallery-items article figure {
    padding-top: 100%;
    <?php if($settings->max_height == 'false') : ?>
    padding-top: <?php echo $settings->img_height; ?>%;
    <?php endif; ?>
}