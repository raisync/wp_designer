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

.fl-node-<?php echo $id; ?> #buttons .button-item {
    background-color: #212121;
    padding: 0px;
    <?php if($settings->btn_bg <> '') : ?>
	background-color: #<?php echo $settings->btn_bg; ?>;
	<?php endif; ?>
    -webkit-border-radius: <?php echo $settings->btn_radius; ?>px;
    -moz-border-radius: <?php echo $settings->btn_radius; ?>px;
    border-radius: <?php echo $settings->btn_radius; ?>px;
    <?php if($settings->overall_style == 'bordered') : ?>
    background-color: transparent;
	border-width: <?php echo $settings->border_width; ?>px;
	border-style: <?php echo $settings->border_style; ?>;
	border-color: #<?php echo $settings->border_color; ?>;
	<?php endif; ?>
    <?php if($settings->overall_style == 'ultimate') : ?>
	border-width: <?php echo $settings->border_width; ?>px;
	border-style: <?php echo $settings->border_style; ?>;
	border-color: #<?php echo $settings->border_color; ?>;
	<?php endif; ?>
    <?php if($settings->btn_dropshadow == 'light') : ?>
	box-shadow: 0 2px 10px rgba(33,33,33,0.3);
	<?php endif; ?>
    <?php if($settings->btn_dropshadow == 'normal') : ?>
	box-shadow: 0 2px 10px rgba(33,33,33,0.4);
	<?php endif; ?>
    <?php if($settings->btn_dropshadow == 'dark') : ?>
	box-shadow: 0 2px 10px rgba(33,33,33,0.6);
	<?php endif; ?>
    <?php if($settings->btn_dropshadow == 'darker') : ?>
	box-shadow: 0 2px 10px rgba(33,33,33,0.9);
	<?php endif; ?>
    <?php if($settings->btn_dropshadow == 'darkest') : ?>
	box-shadow: 0 5px 5px rgba(0,0,0,1);
	<?php endif; ?>
    <?php if($settings->btn_padding == 'custom') : ?>
    padding: <?php echo $settings->custom_btn_padding; ?>px;
    <?php endif; ?>
}

.fl-node-<?php echo $id; ?> #buttons .button-item:hover {
    border-color: transparent;
    background: #212121;
    <?php if($settings->hover_color <> '') : ?>
	background: #<?php echo $settings->hover_color; ?>;
	<?php endif; ?>
}

.fl-node-<?php echo $id; ?> .button-item-content {
    font-style: <?php echo $settings->font_style; ?>;
}

.fl-node-<?php echo $id; ?> .button-item-content h2 {
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

.fl-node-<?php echo $id; ?> #buttons i.icon-lg {
    font-size: 60px;
    color: #<?php echo $settings->icon_color; ?> !important;
    <?php if($settings->icon_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_icon_size; ?>px !important;
	<?php endif; ?>
}
<?php if($settings->hover_text_color <> '') : ?>
.fl-node-<?php echo $id; ?> #buttons .button-item:hover i.icon-lg {
	color: #<?php echo $settings->hover_text_color; ?> !important;
}
<?php endif; ?>

<?php if($settings->color <> '') : ?>
.fl-node-<?php echo $id; ?> .button-item-content h2 {
	color: #<?php echo $settings->color; ?> !important;
}
<?php endif; ?>

.fl-node-<?php echo $id; ?> #buttons .button-item:hover .button-item-content h2 {
    color: #fff;
    <?php if($settings->hover_text_color <> '') : ?>
	color: #<?php echo $settings->hover_text_color; ?> !important;
	<?php endif; ?>
}

<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .button-item-content h2 {
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>