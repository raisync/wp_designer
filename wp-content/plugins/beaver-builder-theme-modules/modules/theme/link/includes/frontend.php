<h2 class="heading-link">
	<?php if(!empty($settings->link)) : ?>
	<a href="<?php echo $settings->link; ?>" title="<?php echo $settings->heading; ?>" target="<?php echo $settings->link_target; ?>">
	<?php endif; ?>
	<span class="heading-link-text"><?php echo $settings->heading; ?>
	    <?php if($settings->icon <> '') : ?>
        <span><i class="icon-lg <?php echo $settings->icon; ?>"></i></span>
        <?php endif; ?>
	</span>
	<?php if(!empty($settings->link)) : ?>
	</a>
	<?php endif; ?>
</h2>