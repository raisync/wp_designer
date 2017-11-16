<?php

$photo    = $module->get_data();
$classes  = $module->get_classes();
$src      = $module->get_src();
$link     = $module->get_link();
$alt      = $module->get_alt();
$attrs    = $module->get_attributes();
$filetype = pathinfo($src, PATHINFO_EXTENSION);

?>

<div id="featured">
    <div class="fl-blurb" style="background: url(<?php echo $src; ?>) no-repeat; background-size: cover;">

    <!--
        <div class="fl-photo<?php if ( ! empty( $settings->crop ) ) echo ' fl-photo-crop-' . $settings->crop ; ?> fl-photo-align-<?php echo $settings->align; ?>" itemscope itemtype="http://schema.org/ImageObject">
            <div class="fl-photo-content fl-photo-img-<?php echo $filetype; ?>">
                <?php if(!empty($link)) : ?>
                <a href="<?php echo $link; ?>" target="<?php echo $settings->link_target; ?>" itemprop="url">
                <?php endif; ?>
                <img class="<?php echo $classes; ?>" src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" itemprop="image" <?php echo $attrs; ?> />
                <?php if(!empty($link)) : ?>
                </a>
                <?php endif; ?>    
                <?php if($photo && !empty($photo->caption) && 'hover' == $settings->show_caption) : ?>
                <div class="fl-photo-caption fl-photo-caption-hover" itemprop="caption"><?php echo $photo->caption; ?></div>
                <?php endif; ?>
            </div>
            <?php if($photo && !empty($photo->caption) && 'below' == $settings->show_caption) : ?>
            <div class="fl-photo-caption fl-photo-caption-below" itemprop="caption"><?php echo $photo->caption; ?></div>
            <?php endif; ?>
        </div>
    -->

        

    </div>
    
    <div class="fl-blurb-content">
        <<?php echo $settings->tag; ?> class="fl-heading alignment">
            <span class="fl-heading-text"><?php echo $settings->heading; ?></span>
            
        </<?php echo $settings->tag; ?>>

        <h3 class="fl-subheading alignment">
            <span class="fl-subheading-text"><?php echo $settings->subheading; ?></span>
        </h3>
    
        <?php if(!empty($settings->link)) : ?>
        <a class="alignment" href="<?php echo $settings->link; ?>" title="<?php echo $settings->heading; ?>" target="<?php echo $settings->link_target; ?>">
            <i class="chevron-link fa fa-chevron-down"></i>
        </a>
        <?php endif; ?>
    </div>
        
</div>