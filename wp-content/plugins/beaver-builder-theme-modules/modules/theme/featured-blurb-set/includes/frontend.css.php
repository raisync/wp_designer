.fl-node-<?php echo $id; ?> {
	padding-top: <?php echo $settings->padding_top; ?>px;
	padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	padding-left: <?php echo $settings->padding_left; ?>px;
	padding-right: <?php echo $settings->padding_right; ?>px;
}

.fl-node-<?php echo $id; ?> .blurb-number h3 {
    <?php if($settings->label_color <> '') : ?>
        color: #<?php echo $settings->label_color; ?>;
    <?php endif; ?>
    <?php if( ($settings->label_bgcolor <> '') && ($settings->label_opacity <> '') ) : ?>
        background: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->label_bgcolor ) ) ?>, <?php echo $settings->label_opacity; ?>);
    <?php endif; ?>
}

<?php if($settings->filter == 'grayscale') : ?>
.fl-node-<?php echo $id; ?> .fl-blurb .fl-photo-content img { -webkit-filter: grayscale(100%); filter: grayscale(100%);}
<?php endif; ?>
<?php if($settings->filter == 'sepia') : ?>
.fl-node-<?php echo $id; ?> .fl-blurb .fl-photo-content img { -webkit-filter: sepia(100%); filter: sepia(100%);}
<?php endif; ?>

<?php if( ($settings->filter_color <> '') && ($settings->filter_opacity <> '') ) : ?>
.fl-node-<?php echo $id; ?> .fl-blurb .fl-photo-content.fl-photo-img-png:before { background: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->filter_color ) ) ?>, <?php echo $settings->filter_opacity; ?>); }
<?php endif; ?>

<?php if( ($settings->h_shadow <> '') && ($settings->v_shadow <> '') && ($settings->blur <> '') && ($settings->spread <> '') && ($settings->shadow_color <> '') && ($settings->shadow_opacity <> '') ) : ?>
.fl-node-<?php echo $id; ?> #blurb {
    box-shadow: <?php echo $settings->h_shadow; ?>px <?php echo $settings->v_shadow; ?>px <?php echo $settings->blur; ?>px <?php echo $settings->spread; ?>px rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->shadow_color ) ) ?>, <?php echo $settings->shadow_opacity; ?>);
}
<?php endif; ?>

<?php if( ($settings->b_radius <> '') ) : ?>
.fl-node-<?php echo $id; ?> #blurb {
    overflow: hidden;
    -webkit-border-radius: <?php echo $settings->b_radius; ?>px;
    -moz-border-radius: <?php echo $settings->b_radius; ?>px;
    border-radius: <?php echo $settings->b_radius; ?>px;
}
<?php endif; ?>

.fl-node-<?php echo $id; ?> .fl-heading {
    margin: 30px 0 0;
    <?php if($settings->font_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_font_size; ?>px;
	<?php endif; ?>
	text-align: <?php echo $settings->h_alignment; ?>;
	<?php if($settings->line_height == 'custom') : ?>
	line-height: <?php echo $settings->custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->opacity/100; ?>;
}
<?php if(!empty($settings->color)) : ?>
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading a,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text * {
	color: #<?php echo $settings->color; ?>;
}
<?php endif; ?>
<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .fl-heading .fl-heading-text{
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>
<?php if($global_settings->responsive_enabled && ($settings->r_font_size == 'custom' || $settings->r_alignment == 'custom' || $settings->r_line_height == 'custom' || $settings->r_letter_spacing == 'custom')) : ?>

@media (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {
	
	<?php if($settings->r_font_size == 'custom') : ?>
	.fl-node-<?php echo $id; ?>.fl-module-heading .fl-heading {
		font-size: <?php echo $settings->r_custom_font_size; ?>px;
	}
	<?php endif; ?>
	
	<?php if($settings->r_alignment == 'custom') : ?>
	.fl-node-<?php echo $id; ?>.fl-module-heading .fl-heading {
		text-align: <?php echo $settings->r_custom_alignment; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_line_height == 'custom') : ?>
	.fl-node-<?php echo $id; ?>.fl-module-heading .fl-heading {
		line-height: <?php echo $settings->r_custom_line_height; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_letter_spacing == 'custom') : ?>
	.fl-node-<?php echo $id; ?>.fl-module-heading .fl-heading {
		letter-spacing: <?php echo $settings->r_custom_letter_spacing; ?>px;
	}
	<?php endif; ?>
}    
<?php endif; ?>