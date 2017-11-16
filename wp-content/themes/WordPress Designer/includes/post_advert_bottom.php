<?php if (get_option('chameleon_integration_single_bottom') <> '' && get_option('chameleon_integrate_singlebottom_enable') == 'on') echo esc_html(get_option('chameleon_integration_single_bottom')); ?> <?php if (get_option('chameleon_468_enable') == 'on') { ?>
	<?php if (get_option('chameleon_468_adsense') <> '') { 
		echo get_option('chameleon_468_adsense'); 
	} else { ?>
		<a href="<?php echo esc_url(get_option('chameleon_468_url')); ?>">
			<img src="<?php echo esc_attr(get_option('chameleon_468_image')); ?>" alt="468 ad" class="foursixeight" />
		</a>
	<?php } ?>
<?php } ?>