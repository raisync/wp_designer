<h2 class="section-heading">
	<?php if(!empty($settings->link)) : ?>
	<a href="<?php echo $settings->link; ?>" title="<?php echo $settings->heading; ?>" target="<?php echo $settings->link_target; ?>">
	<?php endif; ?>
	<span class="section-heading-text"><?php echo $settings->heading; ?><!--<span class="borderline"></span>--></span>
	<?php if(!empty($settings->link)) : ?>
	</a>
	<?php endif; ?>
</h2>

<?php if(!empty($settings->subheading)) : ?>
<h3 class="section-subheading">
    <span class="section-subheading-text"><?php echo $settings->subheading; ?></span>
</h3>
<?php endif; ?>