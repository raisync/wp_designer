.fl-node-<?php echo $id; ?> .fl-heading, 
.fl-node-<?php echo $id; ?> .fl-subheading {
	text-align: <?php echo $settings->alignment; ?>;
}

.fl-node-<?php echo $id; ?> .section-heading {
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

.fl-node-<?php echo $id; ?> .section-subheading {
    text-align: <?php echo $settings->alignment; ?>;
}

<?php if(!empty($settings->color)) : ?>
.fl-node-<?php echo $id; ?> h2.section-heading a,
.fl-node-<?php echo $id; ?> h2.section-heading .section-heading-text,
.fl-node-<?php echo $id; ?> h2.section-heading .section-heading-text * {
	color: #<?php echo $settings->color; ?>;
}
<?php endif; ?>

<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .section-heading .section-heading-text{
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>
<?php if($global_settings->responsive_enabled && ($settings->r_font_size == 'custom' || $settings->r_alignment == 'custom' || $settings->r_line_height == 'custom' || $settings->r_letter_spacing == 'custom')) : ?>

@media (max-width: <?php echo $global_settings->responsive_breakpoint; ?>px) {
	
	<?php if($settings->r_font_size == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .section-heading {
		font-size: <?php echo $settings->r_custom_font_size; ?>px;
	}
	<?php endif; ?>
	
	<?php if($settings->r_alignment == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .section-heading {
		text-align: <?php echo $settings->r_custom_alignment; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_line_height == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .section-heading {
		line-height: <?php echo $settings->r_custom_line_height; ?>;
	}
	<?php endif; ?>

	<?php if($settings->r_letter_spacing == 'custom') : ?>
	.fl-node-<?php echo $id; ?> .section-heading {
		letter-spacing: <?php echo $settings->r_custom_letter_spacing; ?>px;
	}
	<?php endif; ?>
}    
<?php endif; ?>