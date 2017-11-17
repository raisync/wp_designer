<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>">
	<meta name="robots" content="noindex, nofollow">
	<?php elegant_description(); ?>
	<?php elegant_keywords(); ?>
	<?php elegant_canonical(); ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header id="header">
		<div id="header-content" class="clearfix">
			<div class="container-fluid">
				<figure id="logo">
					<a onclick="javascript:location.href='<?php echo esc_url( home_url( '/' ) ); ?>'" title="<?php echo esc_attr( get_bloginfo( 'name' ) ); echo ' '; echo esc_attr( get_bloginfo( 'description' ) ); ?>">
						<?php $logo = (get_option('chameleon_logo') <> '') ? get_option('chameleon_logo') : get_stylesheet_directory_uri().'/images/logo.svg'; ?>
						<img src="<?php echo esc_attr( $logo ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name' ) ); ?>">
					</a>
					<?php if ( is_front_page() ) { ?>
						<h1 class="hidden-top"><?php echo esc_attr( get_bloginfo( 'name' ) ); echo ' '; echo esc_attr( get_bloginfo( 'description' ) ); ?></h1>
					<?php } ?>
				</figure>
				<div id="main-menu">
					<?php get_template_part('includes/primary_menu'); ?>
					<a href="javascript: void(0)">
						<img src="/wd/wp-content/uploads/2017/11/contact_nav.png" class="quote">
					</a>
				</div>
			</div>
		</div>
	</header>