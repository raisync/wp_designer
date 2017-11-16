<?php if ( $settings->max_height == 'false' ) { ?> 
.slider-template {
    height: <?php echo $settings->slider_height; ?>px;
}
.slider-template .container.slider-parallax{ height: <?php echo $settings->slider_height; ?>px; }
    @media only screen and ( min-width: 1024px ) and ( min-height: 500px ) {
    	.slider-template-bg,
    	.fl-module-slider-template,
    	.fl-module-slider-template .container { height: <?php echo $settings->slider_height; ?>px }
    }
    <?php if ( $settings->mobile_max_height <> '' ) { ?> 
        @media only screen and ( max-width: 768px ) {
            .slider-template {
                height: <?php echo $settings->mobile_max_height; ?>px;
            }
            .slider-template .container.slider-parallax{ height: <?php echo $settings->mobile_max_height; ?>px; }
        }
    <?php } ?>
<?php } ?>

<?php if ( $settings->max_height == 'true' ) { ?> 
.slider-template {
    height: 100vh;
}
.slider-template .container.slider-parallax{ height: 100vh; }
@media only screen and ( min-width: 1024px ) and ( min-height: 500px ) {
	.slider-template-bg,
	.fl-module-slider-template,
	.fl-module-slider-template .container { height: 100vh; }
}
<?php } ?>

<?php if ( ( $settings->t_position == 'l_top' ) || ( $settings->t_position == 'l_bot' ) ) { ?> 
.slider-parallax-text {
    text-align: left;
}
<?php } ?>
<?php if ( $settings->t_position == 'l_top' ) { ?> 
.slider-parallax-text {
    top: <?php echo $settings->v_margin; ?>px;
    left: <?php echo $settings->h_margin; ?>px;
}
<?php } ?>
<?php if ( $settings->t_position == 'r_top' ) { ?> 
.slider-parallax-text {
    top: <?php echo $settings->v_margin; ?>px;
    right: <?php echo $settings->h_margin; ?>px;
}
<?php } ?>
<?php if ( ( $settings->t_position == 'r_top' ) || ( $settings->t_position == 'r_bot' ) ) { ?> 
.slider-parallax-text {
    text-align: right;
}
<?php } ?>
<?php if ( $settings->t_position == 'l_bot' ) { ?> 
.slider-parallax-text {
    bottom: <?php echo $settings->v_margin; ?>px;
    left: <?php echo $settings->h_margin; ?>px;
}
<?php } ?>
<?php if ( $settings->t_position == 'r_bot' ) { ?> 
.slider-parallax-text {
    bottom: <?php echo $settings->v_margin; ?>px;
    right: <?php echo $settings->h_margin; ?>px;
}
<?php } ?>
<?php if ( $settings->t_position == 'center' ) { ?> 
.slider-parallax-text {
    top: calc(50% - 10%);
    right: <?php echo $settings->h_margin; ?>px;
    left: <?php echo $settings->h_margin; ?>px;
    text-align: center;
}
<?php } ?>

.fl-node-<?php echo $id; ?> .slider-parallax-text h3 {
    margin-bottom: 0 !important;
    <?php if($settings->pre_font_size == 'custom') : ?>
	font-size: <?php echo $settings->pre_custom_font_size; ?>px;
	<?php endif; ?>
	<?php if($settings->pre_line_height == 'custom') : ?>
	line-height: <?php echo $settings->pre_custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->pre_letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->pre_custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->pre_title_opacity; ?>;
}
.fl-node-<?php echo $id; ?> .slider-parallax-text h2 {
    <?php if($settings->font_size == 'custom') : ?>
	font-size: <?php echo $settings->custom_font_size; ?>px;
	<?php endif; ?>
	<?php if($settings->line_height == 'custom') : ?>
	line-height: <?php echo $settings->custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->title_opacity; ?>;
}
.fl-node-<?php echo $id; ?> .slider-parallax-text p {
    <?php if($settings->p_font_size == 'custom') : ?>
	font-size: <?php echo $settings->p_custom_font_size; ?>px;
	<?php endif; ?>
	<?php if($settings->p_line_height == 'custom') : ?>
	line-height: <?php echo $settings->p_custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->p_letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->p_custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->content_opacity; ?>;
}

<?php if(!empty($settings->pre_title_color)) : ?>
.fl-node-<?php echo $id; ?> .slider-parallax-text h3 {
	color: #<?php echo $settings->pre_title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($settings->title_color)) : ?>
.fl-node-<?php echo $id; ?> .slider-parallax-text h2 {
	color: #<?php echo $settings->title_color; ?>;
}
<?php endif; ?>
<?php if(!empty($settings->content_color)) : ?>
.fl-node-<?php echo $id; ?> .slider-parallax-text p,
.fl-node-<?php echo $id; ?> .slider-parallax-text p * {
	color: #<?php echo $settings->content_color; ?>;
}
<?php endif; ?>

<?php if( !empty($settings->pre_font) && $settings->pre_font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .slider-parallax-text h3 {
	<?php FLBuilderFonts::font_css( $settings->pre_font ); ?>
}
<?php endif; ?>

<?php if( !empty($settings->font) && $settings->font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .slider-parallax-text h2 {
	<?php FLBuilderFonts::font_css( $settings->font ); ?>
}
<?php endif; ?>

<?php if( !empty($settings->p_font) && $settings->p_font['family'] != 'Default' ) : ?>
.fl-node-<?php echo $id; ?> .slider-parallax-text p {
	<?php FLBuilderFonts::font_css( $settings->p_font ); ?>
}
<?php endif; ?>

a.slider-ui-button {
    <?php if($settings->btn_margintop <> '') : ?>
    margin-top: <?php echo $settings->btn_margintop; ?>px !important;
    <?php endif; ?>
    <?php if($settings->btn_font_size == 'custom') : ?>
	font-size: <?php echo $settings->btn_custom_font_size; ?>px;
	<?php endif; ?>
	<?php if($settings->btn_line_height == 'custom') : ?>
	line-height: <?php echo $settings->btn_custom_line_height; ?>;
	<?php endif; ?>
	<?php if($settings->btn_letter_spacing == 'custom') : ?>
	letter-spacing: <?php echo $settings->btn_custom_letter_spacing; ?>px;
	<?php endif; ?>
    opacity: <?php echo $settings->btn_opacity; ?>;
    font-weight: 700; 
    color: <?php echo $settings->btn_color; ?>; 
    display: inline-block;
    margin: 10px; 
    padding: 10px 30px;
    border-radius: <?php echo $settings->btn_b_radius; ?>px; 
    -moz-border-radius: <?php echo $settings->btn_b_radius; ?>px; 
    -webkit-border-radius: <?php echo $settings->btn_b_radius; ?>px; 
    background: transparent;
    border: 3px solid rgba(255,255,255,1);
}
a.slider-ui-button.highlight {
    <?php if($settings->btn_bgcolor == 'custom') : ?>
        background-color: #<?php echo $settings->custom_btn_bgcolor; ?>; 
    <?php endif; ?>
    border: 3px solid transparent; 
    color: #<?php echo $settings->btn_color; ?>;
	border-width: <?php echo $settings->border_width; ?>px;
	border-style: <?php echo $settings->border_style; ?>;
	border-color: #<?php echo $settings->border_color; ?>;
    <?php if($settings->btn_bgcolor == 'transparent') : ?>
        background-color: #<?php echo $settings->btn_bgcolor; ?>; 
    <?php endif; ?>
}
a.slider-ui-button:hover, 
a.slider-ui-button.highlight:hover { 
    padding: 10px 40px 10px 30px;
    -webkit-transition: all 0.4s cubic-bezier(0.55, 0.055, 0.675, 0.19); 
    -moz-transition: all 0.4s cubic-bezier(0.55, 0.055, 0.675, 0.19); 
    transition: all 0.4s cubic-bezier(0.55, 0.055, 0.675, 0.19); 
}

a.slider-ui-button::after { 
    content: "\f054"; 
    font-family: 'Fontawesome'; 
    float: right; 
    margin: 3px 0 0 -10px; 
    width: 10px; opacity: 0; 
    transition: all 0.3s ease 0s; 
    -webkit-transition: all 0.3s ease 0s; 
}
a.slider-ui-button:hover { opacity: 1; }
a.slider-ui-button:hover::after { opacity: 1; margin: 3px -20px 0 0; }

<?php if ( !empty($settings->padding_top) || !empty($settings->padding_bottom) || !empty($settings->padding_left) || !empty($settings->padding_right) ) { ?>
.fl-node-<?php echo $id; ?> {
	padding-top: <?php echo $settings->padding_top; ?>px;
	padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	padding-left: <?php echo $settings->padding_left; ?>px;
	padding-right: <?php echo $settings->padding_right; ?>px;
}
<?php } ?>
<?php if ( !empty($settings->slider_bg_color) ) { ?>
.slider-template-bg{
	background-color: #<?php echo $settings->slider_bg_color; ?>;
}
<?php } ?>
<?php if ( !empty($settings->overlay_opacity) ) { ?>
.slider-template-bg::before{
	background-color: rgba( 0,0,0, <?php echo $settings->overlay_opacity/100; ?>);
}
<?php } ?> <!--End Slider-->

<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>
.slider-template-info-<?php echo $i; ?> {
    
}

.slider-template-info-<?php echo $i; ?> p.slider-ui-button-title { margin-bottom: 10px; }
.slider-template-info-<?php echo $i; ?> p.slider-ui-button-title em,
.slider-template-info-<?php echo $i; ?> p.slider-ui-button-title span { font-weight: 700; }


@media only screen and ( max-width: 1024px ) {
	.slider-template-info-<?php echo $i; ?> h2{ padding: 0;}
	.slider-template-info-<?php echo $i; ?> { transform: none !important; float: none; width: 100%; }
    a.slider-ui-button, 
    a.slider-ui-button.highlight { 
        padding: 10px 50px 10px 30px;
    }
    a.slider-ui-button::after {
        margin: 0 0 0 0px; 
        width: 10px; opacity: 1; 
        transition: all 0.3s ease 0s; 
        -webkit-transition: all 0.3s ease 0s; 
    }
    a.slider-ui-button::after { opacity: 1; margin: 3px -20px 0 0; }
}
@media only screen and ( max-width: 1023px ) {
	.slider-template-info-<?php echo $i; ?> h2 { font-size: 60px; }
}
@media only screen and ( max-width: 768px ) {
	.slider-template-info-<?php echo $i; ?> h2 { font-size: 40px; }
}
@media only screen and ( max-width: 768px ) {
	.slider-template-info-<?php echo $i; ?> h2 { font-size: 40px; }
}
@media only screen and ( max-width: 375px ) {
    .slider-template-info-<?php echo $i; ?> h2.title { font-size: 40px; }
}

<?php endfor; ?>
