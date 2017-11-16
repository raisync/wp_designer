		<footer>
			<div id="footer-content" class="clearfix">
				<div id="footer-widgets" class="clearfix">
					<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
					<?php endif; ?>
				</div> <!-- end #footer-widgets -->
				<p><span id="copyright"><img src="/wd/wp-content/uploads/2017/11/logo-2.png">&emsp;Copyright <?php echo date('Y'); ?>. All rights reserved.</span>
				<span id="footer-menu" class="bold">
					<?php wp_nav_menu( array(  'menu_id'  =>  4) ); ?> <!-- FOOTER MENU -->
				</span></p>
			</div> <!-- end #footer-content -->
		</footer> <!-- end #footer -->
	</div> <!-- end #container -->
	<?php get_template_part('includes/scripts'); ?>
	<?php wp_footer(); ?>
</body>
</html>
