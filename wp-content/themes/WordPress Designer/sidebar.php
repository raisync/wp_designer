
<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) { } else { ?>
<aside id="sidebar" class="col-sm-12 col-lg-3">
	<div class="sidebar-inner">
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar') ) : ?><?php endif; ?>
	</div>
</aside> <!-- end #sidebar -->
<?php } ?>