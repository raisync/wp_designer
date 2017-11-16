.fl-node-<?php echo $id; ?> .alignment {
	text-align: <?php echo $settings->alignment; ?>;
}

.fl-node-<?php echo $id; ?> .fl-module-content {
	margin-top: 0px !important;
	margin-bottom: 0px !important;
	margin-left: 0px !important;
	margin-right: 0px !important;
}

<?php if ( !empty($settings->padding_top) || !empty($settings->padding_bottom) || !empty($settings->padding_left) || !empty($settings->padding_right) ) { ?>
.fl-node-<?php echo $id; ?> .fl-module-content {
	padding-top: <?php echo $settings->padding_top; ?>px;
	padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	padding-left: <?php echo $settings->padding_left; ?>px;
	padding-right: <?php echo $settings->padding_right; ?>px;
}
<?php } ?>
<?php //endif; ?>
<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>
    
<?php endfor; ?>

.fl-node-<?php echo $id; ?> .list-item-content h2 {
    <?php if($settings->font_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_font_size; ?>px !important;
	<?php endif; ?>
	<?php if($settings->line_height == 'custom') : ?>
	line-height: <?php echo $settings->custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->opacity; ?>;
}
.fl-node-<?php echo $id; ?> .list-item-content p {
    <?php if($settings->p_font_size == 'custom') : ?>
	font-size: <?php echo $settings->p_custom_font_size; ?>px !important;
	<?php endif; ?>
	<?php if($settings->p_line_height == 'custom') : ?>
	line-height: <?php echo $settings->p_custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->p_letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->p_custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->opacity; ?>;
}

.fl-node-<?php echo $id; ?> #lists i.icon-lg {
    font-size: 60px;
    <?php if($settings->icon_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_icon_size; ?>px !important;
	<?php endif; ?>
	color: #<?php echo $settings->icon_color; ?> !important;
}

<?php if(!empty($settings->color)) : ?>
.fl-node-<?php echo $id; ?> .list-item-content h2,
.fl-node-<?php echo $id; ?> .list-item-content p,
.fl-node-<?php echo $id; ?> .list-item-content p * {
	color: #<?php echo $settings->color; ?> !important;
}
<?php endif; ?>

<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .list-item-content h2 {
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>

<?php if( !empty($settings->p_font) && $settings->p_font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .list-item-content p {
	<?php FLBuilderFonts::font_css( $settings->p_font ); ?>
}
<?php endif; ?>