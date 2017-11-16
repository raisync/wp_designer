<div class="post-navigation">
	<?php $prev_post = get_previous_post(); if (!empty( $prev_post )) { ?>
		<a class="btn btn-small readmore" href="<?php echo get_permalink( $prev_post->ID );?>" title="&lt; <?php echo $prev_post->post_title;?>"><i class="fa fa-angle-left"></i> Previous</a>
	<?php } ?>
	<?php $next_post = get_next_post();  if (!empty( $next_post )) { ?>
		<a class="btn btn-small readmore alignright" href="<?php echo get_permalink( $next_post->ID );?>" title="<?php echo $next_post->post_title;?> &gt;">Next <i class="fa fa-angle-right"></i></a>
	<?php } ?>
</div>