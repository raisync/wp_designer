.fl-node-<?php echo $id; ?> .alignment {
	text-align: <?php echo $settings->alignment; ?>;
}

.fl-node-<?php echo $id; ?> .fl-module-content {
	margin-top: 0px !important;
	margin-bottom: 0px !important;
	margin-left: 0px !important;
	margin-right: 0px !important;
}

<?php if ( !empty($settings->padding_top) || !empty($settings->padding_bottom) || !empty($settings->padding_left) || !empty($settings->padding_right) ) { ?>
.fl-node-<?php echo $id; ?> .fl-module-content {
	padding-top: <?php echo $settings->padding_top; ?>px;
	padding-bottom: <?php echo $settings->padding_bottom; ?>px;
	padding-left: <?php echo $settings->padding_left; ?>px;
	padding-right: <?php echo $settings->padding_right; ?>px;
}
<?php } ?>
<?php //endif; ?>
<?php for($i = 0; $i < count($settings->items); $i++) : if(!is_object($settings->items[$i])) continue; ?>

    


<?php endfor; ?>