.fl-node-<?php echo $id; ?> {
	padding-top: <?php echo $settings->padding_top; ?>px;
	padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	padding-left: <?php echo $settings->padding_left; ?>px;
	padding-right: <?php echo $settings->padding_right; ?>px;
}

.fl-node-<?php echo $id; ?> .posts-filter { 
    text-align: <?php echo $settings->text_align; ?>;
}

.fl-node-<?php echo $id; ?> .posts-items article figure {
    padding-top: 100%;
    <?php if($settings->max_height == 'false') : ?>
    padding-top: <?php echo $settings->img_height; ?>%;
    <?php endif; ?>
}

.fl-node-<?php echo $id; ?> .posts-button:hover {
    color: #BE8D5E;
    <?php if($settings->nav_color <> '') : ?>
    color: #<?php echo $settings->nav_color; ?> !important;
    <?php endif; ?>
}

.fl-node-<?php echo $id; ?> .posts-filter .active { 
    background: transparent;
    color: #BE8D5E;
    border-bottom: 2px solid #BE8D5E;
    <?php if($settings->nav_color <> '') : ?>
    color: #<?php echo $settings->nav_color; ?> !important;
    border-bottom: 2px solid #<?php echo $settings->nav_color; ?> !important;
    <?php endif; ?>
}

.fl-node-<?php echo $id; ?> .posts-items article figure .posts-button {
    color: #5c5c5c;
    border: 2px solid #5c5c5c;
    <?php if($settings->nav_color <> '') : ?>
    color: #<?php echo $settings->nav_color; ?> !important;
    border: 2px solid #<?php echo $settings->nav_color; ?> !important;
    <?php endif; ?> 
}
.fl-node-<?php echo $id; ?> .posts-items article figure .posts-button:hover {
    color: #058bcb !important;
    background-color: transparent;
    border: 2px solid #058bcb !important;
}

.fl-node-<?php echo $id; ?> .post-heading {
	text-align: <?php echo $settings->alignment; ?>;
    <?php if($settings->font_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_font_size; ?>px;
	<?php endif; ?>
	<?php if($settings->line_height == 'custom') : ?>
	line-height: <?php echo $settings->custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->opacity; ?>;
}

<?php if(!empty($settings->color)) : ?>
.fl-node-<?php echo $id; ?> h2.post-heading a,
.fl-node-<?php echo $id; ?> h2.post-heading .post-heading-text,
.fl-node-<?php echo $id; ?> h2.post-heading .post-heading-text * {
	color: #<?php echo $settings->color; ?>;
}
<?php endif; ?>

<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .post-heading .post-heading-text{
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>
<?php if($global_settings->responsive_enabled && ($settings->r_font_size == 'custom' || $settings->r_alignment == 'custom' || $settings->r_line_height == 'custom' || $settings->r_letter_spacing == 'custom')) : ?>

@media (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {
	
	<?php if($settings->r_font_size == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .post-heading {
		font-size: <?php echo $settings->r_custom_font_size; ?>px;
	}
	<?php endif; ?>
	
	<?php if($settings->r_alignment == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .post-heading {
		text-align: <?php echo $settings->r_custom_alignment; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_line_height == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .post-heading {
		line-height: <?php echo $settings->r_custom_line_height; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_letter_spacing == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .post-heading {
		letter-spacing: <?php echo $settings->r_custom_letter_spacing; ?>px;
	}
	<?php endif; ?>
}    
<?php endif; ?>