.fl-node-<?php echo $id; ?> .alignment {
	text-align: <?php echo $settings->h_alignment; ?>;
}

.fl-node-<?php echo $id; ?> .fl-heading {
	text-align: <?php echo $settings->h_alignment; ?>;
	<?php if($settings->font_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_font_size; ?>px;
	<?php endif; ?>
	<?php if($settings->line_height == 'custom') : ?>
	line-height: <?php echo $settings->custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->custom_letter_spacing; ?>px;
	<?php endif; ?>
    <?php if($settings->v_alignment != 'center') : ?>
        <?php echo $settings->v_alignment; ?>: <?php echo $settings->v_margin_spacing; ?>px;
    <?php endif; ?>
    <?php if($settings->v_alignment == 'center') : ?>
        top: calc(50% - <?php echo $settings->custom_font_size; ?>px/2);
    <?php endif; ?>
    padding: 0 <?php echo $settings->h_margin_spacing; ?>px;
    opacity: <?php echo $settings->opacity; ?>;
}

<?php if(!empty($settings->subheading)) : ?>
.fl-node-<?php echo $id; ?> #featured .fl-subheading {
    display: block;
}
<?php endif; ?>

<?php if($settings->filter == 'grayscale') : ?>
.fl-node-<?php echo $id; ?> .fl-blurb { -webkit-filter: grayscale(100%); filter: grayscale(100%);}
<?php endif; ?>
<?php if($settings->filter == 'sepia') : ?>
.fl-node-<?php echo $id; ?> .fl-blurb { -webkit-filter: sepia(100%); filter: sepia(100%);}
<?php endif; ?>

.fl-node-<?php echo $id; ?> #featured { position: relative; overflow: hidden; }
.fl-node-<?php echo $id; ?> #featured:before { content: ""; position: absolute; height: 100%; width: 100%; background: #<?php echo $settings->filter_color; ?>; opacity: <?php echo $settings->filter_opacity/100; ?>; z-index: 1; }

<?php if(!empty($settings->color)) : ?>
.fl-node-<?php echo $id; ?> .fl-subheading span,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading a,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text,
.fl-node-<?php echo $id; ?> <?php echo $settings->tag; ?>.fl-heading .fl-heading-text * {
	color: #<?php echo $settings->color; ?>;
}
<?php endif; ?>

<?php if(!empty($settings->color)) : ?>
i.chevron-link { color: #<?php echo $settings->color; ?> !important; }
    i.chevron-link:before { border: 1px solid #<?php echo $settings->color; ?> !important; }
<?php endif; ?>

<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .fl-heading .fl-heading-text{
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>
<?php if($global_settings->responsive_enabled && ($settings->r_font_size == 'custom' || $settings->r_alignment == 'custom' || $settings->r_line_height == 'custom' || $settings->r_letter_spacing == 'custom')) : ?>

@media (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {
	
	<?php if($settings->r_font_size == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .fl-heading {
		font-size: <?php echo $settings->r_custom_font_size; ?>px;
	}
	<?php endif; ?>
	
	<?php if($settings->r_alignment == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .fl-heading {
		text-align: <?php echo $settings->r_custom_alignment; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_line_height == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .fl-heading {
		line-height: <?php echo $settings->r_custom_line_height; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_letter_spacing == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .fl-heading {
		letter-spacing: <?php echo $settings->r_custom_letter_spacing; ?>px;
	}
	<?php endif; ?>
}    
<?php endif; ?>
<!--

.blurb-content {font-family: "Raleway", sans-serif;}
    .blurb-content p { color: #777; padding: 5px 15px; font-size: 14px; line-height: 1.8em;}
    .blurb-content p strong { font-family: "Montserrat", sans-serif; font-size: 18px;}

.blurb-number { position: relative; margin-top: -10%;}
    .blurb-number h3 { display: block; position: absolute; top: -110%; left: calc(50% - 47.5px); width: 95px; height: 95px; margin: auto !important; background: #c4e8be; border-radius: 100%; z-index: 120;}
    .blurb-number h3 span { display: block; position: absolute; font-size: 36px; font-weight: 700; margin: auto; top: calc(50% - 12px); left: 10px; right: 10px; text-align: center;}-->
