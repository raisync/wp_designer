.fl-node-<?php echo $id; ?> #gravity-form:before {
    <?php if(($settings->bg_color <> '') || ($settings->bg_opacity <> '')) { ?>
    background: rgba(<?php echo implode( ',', FLBuilderColor::hex_to_rgb( $settings->bg_color ) ) ?>, <?php echo $settings->bg_opacity; ?>);
    <?php } ?>
}

<?php if($settings->design_style == 'style2') : ?>
    #gravity-form-content .gform_wrapper .top_label .gfield_error .gfield_label {
        position: relative !important;
    }
<?php endif; ?>

<?php if($settings->design_style == 'style2') : ?>
#gravity-form-content .gform_wrapper .top_label .gfield_error .gfield_label {
    position: absolute !important;
}

@keyframes anim {
  10% { top: -28px; font-size: 16px; opacity: 0.6; }
  20% { top: -26px; font-size: 14px; opacity: 1; }
  100% { top: -24px; font-size: 12px; opacity: 0.6; }
}
.small-label { color: #212121 !important; position: absolute; margin: 0; top: -24px !important; left: 0px !important; font-weight: 400; font-size: 12px !important; opacity: 0.6; animation-name: anim; animation-duration: 0.6s; animation-timing-function: ease-out; animation-delay: 0.2s; }

.fl-node-<?php echo $id; ?> #gravity-form-content .gform_wrapper .top_label .gfield_label {
    padding: 5px 0px !important;
    top: -24px !important;
    left: 0 !important;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 800;
}

.fl-node-<?php echo $id; ?> #gravity-form-content .gform_wrapper input:not([type=radio]):not([type=checkbox]):not([type=submit]):not([type=button]):not([type=image]):not([type=file]), 
.fl-node-<?php echo $id; ?> #gravity-form-content .gform_wrapper textarea, 
.fl-node-<?php echo $id; ?> #gravity-form-content .gform_wrapper select {
    background: #e8e8e8 !important;
    border: 1px solid #cecece !important;
    border-radius: 0 !important;
    padding: 5px 10px !important
}
<?php endif; ?>