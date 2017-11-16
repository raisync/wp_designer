<?php if($settings->design_style == 'style1') : ?>
body .fl-node-<?php echo $id; ?> .blurb-content {
    display: table;
}
.fl-node-<?php echo $id; ?> .blurb-number {
    display: table-cell;
    width: 20%;
}
<?php endif; ?>

<?php if($settings->design_style == 'style2') : ?>
body .fl-node-<?php echo $id; ?> .blurb-content {
    display: block;
}
.fl-node-<?php echo $id; ?> .blurb-number {
    display: block;
    margin-bottom: 10px;
    width: 100%;
}
.fl-node-<?php echo $id; ?> .blurb-text {
    display: block;
}
.fl-node-<?php echo $id; ?> .heading-title, 
.fl-node-<?php echo $id; ?> .blurb-content-text {
    text-align: center !important;
}
<?php endif; ?>

<?php if ( $settings->t_position == 'top' ) { ?> 
body .fl-node-<?php echo $id; ?> .blurb-content {
    position: absolute;
    top: <?php echo $settings->v_margin; ?>px;
    left: <?php echo $settings->h_margin; ?>px;
    right: <?php echo $settings->h_margin; ?>px;
}
<?php } ?>
<?php if ( $settings->t_position == 'bottom' ) { ?> 
body .fl-node-<?php echo $id; ?> .blurb-content {
    position: absolute;
    bottom: <?php echo $settings->v_margin; ?>px;
    left: <?php echo $settings->h_margin; ?>px;
    right: <?php echo $settings->h_margin; ?>px;
}
<?php } ?>
<?php if ( $settings->t_position == 'center' ) { ?> 
body .fl-node-<?php echo $id; ?> .blurb-content {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 100%;
    -webkit-transform: translate(-50%, -50%);  
    transform: translate(-50%, -50%);  
    text-align: center;
}
<?php } ?>

.fl-node-<?php echo $id; ?> .blurb-number h3 {
    <?php if($settings->label_color <> '') : ?>
        color: #<?php echo $settings->label_color; ?>;
    <?php endif; ?>
    <?php if( ($settings->label_bgcolor <> '') && ($settings->label_opacity <> '') ) : ?>
        background: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->label_bgcolor ) ) ?>, <?php echo $settings->label_opacity; ?>);
    <?php endif; ?>
    
    <?php if($settings->label_size <> '') : ?>
    width: <?php echo $settings->label_size; ?>px;
    height: <?php echo $settings->label_size; ?>px;
    <?php endif; ?>

    <?php if( ($settings->label_border <> '') || ($settings->label_border_style <> '') || ($settings->label_border_radius <> '') ) : ?>
    border-width: <?php echo $settings->label_border; ?>px;
    border-style: <?php echo $settings->label_border_style; ?>;
    border-color: #<?php echo $settings->label_border_color; ?>;
    <?php endif; ?>
    
    <?php if($settings->label_b_radius == 'true') : ?>
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    <?php endif; ?>
    <?php if($settings->label_b_radius == 'false') : ?>
    -webkit-border-radius: <?php echo $settings->custom_label_b_radius; ?>px;
    -moz-border-radius: <?php echo $settings->custom_label_b_radius; ?>px;
    border-radius: <?php echo $settings->custom_label_b_radius; ?>px;
    <?php endif; ?>
}

<?php if($settings->icon_size <> '') : ?>
.fl-node-<?php echo $id; ?> .blurb-number h3 span {
    font-size: <?php echo $settings->icon_size; ?>px;
}
<?php endif; ?>

<?php if ( $settings->max_width == 'false' ) { ?> 
.fl-node-<?php echo $id; ?> #blurb {
    width: <?php echo $settings->img_width; ?>px;
    margin: auto;
}
<?php } ?>
<?php if ( $settings->max_width == 'true' ) { ?> 
.fl-node-<?php echo $id; ?> #blurb {
    width: 100%;
}
<?php } ?>

<?php if ( $settings->max_height == 'false' ) { ?> 
.fl-node-<?php echo $id; ?> #blurb {
    height: <?php echo $settings->img_height; ?>px;
}
<?php } ?>
<?php if ( $settings->max_height == 'true' ) { ?> 
.fl-node-<?php echo $id; ?> #blurb {
    height: 100vh;
}
<?php } ?>

<?php if( ($settings->border <> '') || ($settings->border_style <> '') || ($settings->border_radius <> '') ) : ?>
.fl-node-<?php echo $id; ?> #blurb {
    border-width: <?php echo $settings->border; ?>px;
    border-style: <?php echo $settings->border_style; ?>;
    border-color: #<?php echo $settings->border_color; ?>;
}
<?php endif; ?>

<?php if($settings->filter == 'grayscale') : ?>
.fl-node-<?php echo $id; ?> #blurb { -webkit-filter: grayscale(100%); filter: grayscale(100%);}
<?php endif; ?>
<?php if($settings->filter == 'sepia') : ?>
.fl-node-<?php echo $id; ?> #blurb { -webkit-filter: sepia(100%); filter: sepia(100%);}
<?php endif; ?>

<?php if( ($settings->filter_color <> '') && ($settings->filter_opacity <> '') ) : ?>
.fl-node-<?php echo $id; ?> #blurb:before { background: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->filter_color ) ) ?>, <?php echo $settings->filter_opacity; ?>); }
<?php endif; ?>

<?php if( ($settings->h_shadow <> '') && ($settings->v_shadow <> '') && ($settings->blur <> '') && ($settings->spread <> '') && ($settings->shadow_color <> '') && ($settings->shadow_opacity <> '') ) : ?>
.fl-node-<?php echo $id; ?> #blurb {
    box-shadow: <?php echo $settings->h_shadow; ?>px <?php echo $settings->v_shadow; ?>px <?php echo $settings->blur; ?>px <?php echo $settings->spread; ?>px rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->shadow_color ) ) ?>, <?php echo $settings->shadow_opacity; ?>);
}
<?php endif; ?>

.fl-node-<?php echo $id; ?> #blurb {
    <?php if($settings->b_radius == 'true') : ?>
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    <?php endif; ?>
    <?php if($settings->b_radius == 'false') : ?>
    -webkit-border-radius: <?php echo $settings->custom_b_radius; ?>px;
    -moz-border-radius: <?php echo $settings->custom_b_radius; ?>px;
    border-radius: <?php echo $settings->custom_b_radius; ?>px;
    <?php endif; ?>
    <?php if($settings->bg_position <> '') : ?>
    background-position: <?php echo $settings->bg_position; ?> !important;
    <?php endif; ?>
}

.fl-node-<?php echo $id; ?> .heading-title,
.fl-node-<?php echo $id; ?> .blurb-content-text {
	padding-left: <?php echo $settings->text_padding; ?>px;
	padding-right: <?php echo $settings->text_padding; ?>px;
    text-align: <?php echo $settings->h_alignment; ?>;
}
.fl-node-<?php echo $id; ?> .heading-title {
    margin-bottom: 8px;
    <?php if($settings->title_font_size <> '') : ?>
	font-size: <?php echo $settings->title_font_size; ?>px;
	<?php endif; ?>
	<?php if($settings->line_height == 'custom') : ?>
	line-height: <?php echo $settings->custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->opacity; ?>;
}
.fl-node-<?php echo $id; ?> .blurb-content-text {
    <?php if($settings->content_font_size <> '') : ?>
	font-size: <?php echo $settings->content_font_size; ?>px;
	<?php endif; ?>
    line-height: 1.2em;
}
<?php if(!empty($settings->color)) : ?>
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.heading-title a,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.heading-title .heading-title-text,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.heading-title .heading-title-text *,
.fl-node-<?php echo $id; ?> .blurb-content-text p {
	color: #<?php echo $settings->color; ?>;
}
<?php endif; ?>
<?php if(!empty($settings->highlight_color)) : ?>
.fl-node-<?php echo $id; ?> b,
.fl-node-<?php echo $id; ?> em {
	color: #<?php echo $settings->highlight_color; ?>;
}
<?php endif; ?>
<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .heading-title .heading-title-text {
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>
<?php if( !empty($settings->content_font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .blurb-content-text {
	<?php FLBuilderFonts::font_css( $settings->content_font ); ?>
}
<?php endif; ?>
<?php if($global_settings->responsive_enabled && ($settings->r_font_size == 'custom' || $settings->r_alignment == 'custom' || $settings->r_line_height == 'custom' || $settings->r_letter_spacing == 'custom')) : ?>

@media (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {
	
	<?php if($settings->r_font_size == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .heading-title {
		font-size: <?php echo $settings->r_custom_font_size; ?>px;
	}
	<?php endif; ?>
	
	<?php if($settings->r_alignment == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .heading-title {
		text-align: <?php echo $settings->r_custom_alignment; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_line_height == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .heading-title {
		line-height: <?php echo $settings->r_custom_line_height; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_letter_spacing == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .heading-title {
		letter-spacing: <?php echo $settings->r_custom_letter_spacing; ?>px;
	}
	<?php endif; ?>
}    
<?php endif; ?>