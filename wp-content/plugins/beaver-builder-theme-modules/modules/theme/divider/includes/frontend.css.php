.fl-node-<?php echo $id; ?> #divider {
	background: #<?php echo $settings->color; ?>;
    opacity: <?php echo $settings->opacity; ?>;
    width: 100%;
    <?php if ( ($settings->max_width == 'false') && ($settings->custom_width <> '') ) : ?>
	width: <?php echo $settings->custom_width; ?>px;
	<?php endif; ?>
	height: <?php echo $settings->height; ?>px;
    margin: auto;
    <?php if ($settings->dv_alignment == 'left') : ?>
    margin-left: 0px;
    <?php endif; ?>
    <?php if ($settings->dv_alignment == 'right') : ?>
    margin-right: 0px;
    <?php endif; ?>
}

<?php if ($settings->add_icon == 'true') : ?>
    .fl-node-<?php echo $id; ?> #divider i.icon-lg {
        position: absolute;
        top: calc(50% - <?php echo $settings->icon_size/2; ?>px);
    }
    <?php if ($settings->image_options == 'icon') : ?>
    .fl-node-<?php echo $id; ?> #divider i.icon-lg {
        color: #<?php echo $settings->icon_color; ?>;
        text-align: <?php echo $settings->icon_alignment; ?>;
        font-size: <?php echo $settings->icon_size; ?>px;
    }
    <?php endif; ?>
    <?php if ($settings->image_options == 'image') : ?>
    .fl-node-<?php echo $id; ?> #divider .image {
        width: 100%;
        <?php if ( ($settings->image_size == 'false') && ($settings->custom_image_size <> '') ) : ?>
        width: <?php echo $settings->custom_image_size; ?>px;
        <?php endif; ?>
        text-align: <?php echo $settings->image_alignment; ?>;
    }
    <?php endif; ?>
<?php endif; ?>

.icon-lg::before {
    background: #fff;
    padding: 0px 20px;
    border-radius: 100%;
}
