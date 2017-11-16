<?php 
	get_header(); $format = get_post_format() ? : 'standard'; 
	if( empty( $post->post_content) && !is_archive() ) { 
		$no_content = 'no-content'; 
	}
	if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) { 
		$flbuilder = 'fl-builder-enable'; 
	}
	$content_classes = $no_content.$flbuilder;
	if ( $content_classes <> '' ) {
		$content_class = ' class="'.$content_classes.'"';
	} 

	if ( $format == 'aside' ) {
		$aside_class = ' sidebar-right';
	}
	if ( get_post_format() == 'image' ) {
		$post_image_style = ' post-format-image-'.get_field('style');
	}
	$content_area_classes = 'post-format-'.$format.$aside_class.$post_image_style;
	$content_area_class = ' class="post-format '.$content_area_classes.'"';
?>
<main id="content"<?php echo $content_class; ?>>
	<div id="content-area"<?php echo $content_area_class; ?>>
	<div id="content-area-page">
		<div id="low-head">
		<?php get_template_part('includes/breadcrumbs'); ?>
			<div id="title"><?php single_post_title(); ?></div>
		</div>
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<?php $featuresThumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); $featuresThumbURL = $featuresThumb[0]; ?>
			<?php if ( $format == 'standard' ) { ?>
			<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {
				$builderContainer = '-builder';
				$builderRow = '-builder';
				$builderContent = ' col-lg-12';
			} else {
				$builderContent = ' col-sm-12 col-lg-9';
			} ?>
			<div class="container<?php echo $builderContainer; ?>">
				<div class="row<?php echo $builderRow; ?>">
					<article class="contentbar<?php echo $builderContent; ?>"><!--TOP ADVERT-->
                        <div class="post">
							<?php get_template_part('includes/post_advert_top'); ?>
							<div class="post-date<?php if( empty($featuresThumbURL) ) { ?> no-image<?php } ?>">
								<strong><?php the_time('j') ?></strong>
								<span><?php the_time('M') ?></span>
							</div>
							<?php if (get_option('chameleon_share_icons_single') == "on") { ?>
								<?php get_template_part('includes/social_media_share'); ?>
							<?php } ?>
							<?php if (get_option('chameleon_thumbnails') == 'on') { ?>
								<?php if( !empty($featuresThumbURL) ) { ?>
								<div class="post-image">
									<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
								</div><!-- /.post-image -->
								<?php } ?>
							<?php } ?>
							<?php the_content(); ?>
							<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer">
								<?php get_template_part('includes/post_navigation'); ?>
							</div>
							<?php get_template_part('includes/post_advert_bottom'); ?>
							<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
                        </div>
                    </article>
                    <?php get_sidebar(); ?>
                </div>
			</div>
			<?php } else if ( $format == 'aside' ) { ?>
					<div class="container"><div class="row">
						<article class="contentbar col-lg-12">
							<?php get_template_part('includes/post_advert_top'); ?>
							<div class="post-date<?php if( !empty($featuresThumbURL) ) { ?> has-featured-image<?php } ?>">
								<strong><?php the_time('j') ?></strong>
								<span><?php the_time('M') ?></span>
							</div>
							<?php if (get_option('chameleon_thumbnails') == 'on') { ?>
								<?php if( !empty($featuresThumbURL) ) { ?>
								<div class="post-image">
									<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
								</div>
								<?php } ?>
							<?php } ?>
							<?php the_content(); ?>
							<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer">
								<?php get_template_part('includes/post_navigation'); ?>
							</div>
							<?php get_template_part('includes/post_advert_bottom'); ?>
							<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
						</article>
					</div></div>
			<?php } else if ( $format == 'image' ) { ?>
					<div class="post-format-box"<?php if ( get_field('style') != 'carousel' &&  !empty($featuresThumbURL) ) { ?> style="background-image: url(<?php echo $featuresThumbURL; ?>);"<?php } ?>>
						<?php if ( get_field('style') == 'slider' ) { ?>
						<div class="container">
							<div class="row">
								<div class="col-lg-12">
						<?php } ?>
									<?php $images = get_field('gallery'); if( $images ) { ?>
										<div class="post-images owl-carousel">
										<?php foreach( $images as $image ): ?>
											<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>" />
										<?php endforeach; ?>
										</div>
									<?php } else if( !empty($featuresThumbURL) ) { ?>
										<div class="post-images">
											<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
										</div>
									<?php } ?>
						<?php if ( get_field('style') == 'slider' ) { ?>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?>
					<div class="container">
						<div class="row">
							<article class="contentbar col-lg-12">
					<?php } else { ?>
							<article class="contentbar">
					<?php }?>
								<?php get_template_part('includes/post_advert_top'); ?>
								<?php the_content(); ?>
								<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer<?php if ( get_field('additional_information') == true ) { ?> hidden-sm-up<?php } ?>">
									<?php get_template_part('includes/post_navigation'); ?>
								</div>
								<?php get_template_part('includes/post_advert_bottom'); ?>
								<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
					<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?>
							</article>
					<?php } else { ?>
							</article>
						</div>
					</div>
					<?php } ?>
			
			<?php } else if ( $format == 'gallery' ) { ?>
					<div class="post-format-box"<?php if ( !empty($featuresThumbURL) ) { ?> style="background-image: url(<?php echo $featuresThumbURL; ?>);"<?php } ?>>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<?php $images = get_field('gallery'); if( $images ) { ?>
										<div class="post-images gallery">
											<?php foreach( $images as $image ): ?>
												<a class="item" 
													href="<?php echo $image['url']; ?>" 
													title="Inlarge - <?php echo $image['title']; ?>"
													data-src="<?php echo $image['large']; ?>" 
													data-thumb="<?php echo $image['sizes']['medium']; ?>" 
													data-download-url="<?php echo $image['url']; ?>" 
													data-pinterest-text="<?php echo $image['title']; ?>" 
													data-tweet-text="<?php echo $image['title']; ?>"
													data-sub-html=".caption"
												>
													<span style="background-image: url('<?php echo $image['sizes']['medium']; ?>');"></span>
													<div class="caption" style="display:none">
														<?php if ($image['title'] <> '') { ?><h4><?php echo $image['title']; ?></h4><?php } ?>
														<?php if ($image['caption'] <> '') { ?><p><?php echo $image['caption']; ?></p><?php } ?>
													</div>
												</a>
											<?php endforeach; ?>
										</div>
									<?php } else if( !empty($featuresThumbURL) ) { ?>
										<div class="post-images">
											<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
					<?php if ( class_exists( 'FLBuilderModel' ) && !FLBuilderModel::is_builder_enabled() ) {  ?>
					<div class="container">
						<div class="row">
							<article class="contentbar col-lg-12">
					<?php } else { ?>
							<article class="contentbar">
					<?php }?>
								<?php get_template_part('includes/post_advert_top'); ?>
								<?php the_content(); ?>
								<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer<?php if ( get_field('additional_information') == true ) { ?> hidden-sm-up<?php } ?>">
									<?php get_template_part('includes/post_navigation'); ?>
								</div>
								<?php get_template_part('includes/post_advert_bottom'); ?>
								<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
					<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?>
							</article>
					<?php } else { ?>
							</article>
						</div>
					</div>
					<?php } ?>
			<?php } else if ( $format == 'video' ) { ?>
				<div class="post-format-box"<?php if ( !empty($featuresThumbURL) ) { ?> style="background-image: url(<?php echo $featuresThumbURL; ?>);"<?php } ?>>
					<div class="container">
						<div class="row">
						<?php if( have_rows('videos') ) { ?>
							<div class="video-player col-md-9 col-xss-8 col-xs-12">
								<div class="post-videos video-carousel">
								<?php $i = 0; while ( have_rows('videos') ) : the_row(); $i++;
									$poster = $posterThumb = '';
									$posterImg = get_sub_field('poster');
									$poster = ' poster="'.$posterImg['sizes'][ 'large' ].'"';

									$videoTitle = '<h3 class="video-title">'.get_sub_field('title').'</h3>';
									$videoDesc = '<p class="video-desc">'.get_sub_field('description').'</p>';
									$videoListTitle = '<h5 class="video-list-title">'.get_sub_field('title').'</h5>';
														 
									if ( get_sub_field('source') == 'media' && get_sub_field('video_file') <> '' ) {
										$provider = ' mediafile';
									} else if ( get_sub_field('source') == 'oembed' && get_sub_field('video_oembed') <> '' ) {
										$mime_type = $provider = '';
										$videoURL = get_sub_field('video_oembed');
										if (strpos($videoURL, 'youtube') > 0) { 	$mime_type = 'video/youtube'; 		$provider = ' oembed youtube'; }
										if (strpos($videoURL, 'vimeo') > 0) { 		$mime_type = 'video/vimeo'; 		$provider = ' oembed vimeo'; }
										if (strpos($videoURL, 'facebook') > 0) { 	$mime_type = 'video/facebook'; 		$provider = ' oembed facebook'; }
										if (strpos($videoURL, 'twitch') > 0) { 		$mime_type = 'video/twitch'; 		$provider = ' oembed twitch'; }
										if (strpos($videoURL, 'dailymotion') > 0) { $mime_type = 'video/dailymotion'; 	$provider = ' oembed dailymotion'; }
										if (strpos($videoURL, '.flv') > 0) { 		$mime_type = 'video/flv'; 			$provider = ' flv'; }
										if (strpos($videoURL, '.webm') > 0) { 		$mime_type = 'video/webm'; 			$provider = ' webm'; }
										if (strpos($videoURL, '.mp4') > 0) { 		$mime_type = 'video/mp4'; 			$provider = ' mp4'; }
									}
								?>
									<div class="video-carousel-cell<?php echo $provider; ?>" video_id="video_<?php echo $i; ?>">
										<div class="media-wrapper">
										<?php if( get_sub_field('source') == 'media' && get_sub_field('video_file') <> '' ) { ?>
											<video id="video_<?php echo $i; ?>" class="video-file"<?php echo $poster; ?> preload="none" controls>
												<?php
													$video_file = get_sub_field('video_file');
													echo '<source src="'.$video_file['url'].'" type="'.$video_file['mime_type'].'">';
												?>
											</video>
										<?php } else if ( get_sub_field('source') == 'oembed' && get_sub_field('video_oembed') <> '' ) { ?>
											<video id="video_<?php echo $i; ?>" class="video-file"<?php echo $poster; ?> preload="none" controls>
												<?php
													echo '<source src="'.$videoURL.'" type="'.$mime_type.'">';
												?>
											</video>
										<?php } ?>
										</div>
										<div class="video-info">
											<?php echo $videoTitle; ?>
											<?php echo $videoDesc; ?>
										</div>
									</div>
								<?php endwhile ?>
								</div>
							</div>
							<div class="video-list col-lg-3 col-sm-4 col-xs-12">
								<nav class="video-carousel-nav">
								<?php $i = 0; while ( have_rows('videos') ) : the_row(); $i++;
									$poster = '';
									$posterImg = get_sub_field('poster');
									$videoListTitle = '<h5 class="video-list-title">'.get_sub_field('title').'</h5>';
									$posterThumb = ' style=" background-image: url('.$posterImg['sizes'][ 'medium' ].');"';
								?>
									<?php if( get_sub_field('source') == 'oembed' ) $navclass = ' iframe' ?>
									<div video-id="video_<?php echo $i; ?>" class="video-carousel-cell<?php echo $navclass; if ($i == '1') { ?> is-nav-selected<?php } ?>"<?php echo $posterThumb; ?>>
										<?php echo $videoListTitle; ?>
									</div>
								<?php endwhile ?>
								</nav>
							</div>
						<?php } else if( !empty($featuresThumbURL) ) { ?>
							<div class="post-images">
								<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<?php if ( class_exists( 'FLBuilderModel' ) && !FLBuilderModel::is_builder_enabled() ) {  ?><div class="container"><div class="row"><article class="contentbar col-lg-12"><?php } else { ?><article class="contentbar"><?php }?>
						<?php get_template_part('includes/post_advert_top'); ?>
						<?php the_content(); ?>
						<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer<?php if ( get_field('additional_information') == true ) { ?> hidden-sm-up<?php } ?>">
							<?php get_template_part('includes/post_navigation'); ?>
						</div>
						<?php get_template_part('includes/post_advert_bottom'); ?>
						<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
				<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?></article><?php } else { ?></article></div></div><?php } ?>
			
			<?php } else if ( $format == 'audio' ) { ?>
				<div class="post-format-box"<?php if ( !empty($featuresThumbURL) ) { ?> style="background-image: url(<?php echo $featuresThumbURL; ?>);"<?php } ?>>
					<div class="container">
						<div class="row">
						<?php if( have_rows('audios') ) { ?>
							<div class="audio-player col-lg-12">
								<div class="post-audios">
								<?php $i = 0; while ( have_rows('audios') ) : the_row(); $i++;
									$poster = $posterThumb = $background_color = $uiColor = $provider = $audioAuthor = '';
									$posterImg = get_sub_field('poster');
									if ( $posterImg ) {
										$poster = '<div class="audio-poster" style="background-image: url('.$posterImg['sizes'][ 'medium' ].');"></div>';
									} else if ( $featuresThumbURL ) {
										$poster = '<div class="audio-poster" style="background-image: url('.$featuresThumbURL.');"></div>';
										
									}
									$audioTitle = '<h3 class="audio-title">'.get_sub_field('title').'</h3>';
									if ( get_sub_field('author') ) {
										$audioAuthor = '<p class="audio-author">By: '.get_sub_field('author').'</p>';		 
									}
									if ( get_sub_field('source') == 'media' && get_sub_field('audio_file') <> '' ) {
										$provider = ' mediafile';
									} else if ( get_sub_field('source') == 'url' && get_sub_field('audio_url') <> '' ) {
										$mime_type = $provider = '';
										$audioURL = get_sub_field('audio_url');
										if (strpos($audioURL, 'mp3') > 0) { 	$mime_type = 'audio/mp3'; 		$provider = ' url mp3'; }
										if (strpos($audioURL, 'ogg') > 0) { 	$mime_type = 'audio/ogg'; 		$provider = ' url ogg'; }
										if (strpos($audioURL, 'm3u8') > 0) { 	$mime_type = 'audio/m3u8'; 		$provider = ' url m3u8'; }
										if (strpos($audioURL, 'soundcloud') > 0) { 	$mime_type = 'audio/mp3'; 		$provider = ' url soundcloud'; }
									}
									if ( get_sub_field('background_color') ) {
										$background_color = 'style=" background-color: '.get_sub_field('background_color').';"';
									}
									$uiColor = ' '.get_sub_field('ui_color');
								?>
									<div class="audio-list<?php echo $uiColor.$provider; ?>"<?php echo $background_color; ?>>
										<?php echo $poster; ?>
										<div class="audio-info">
											<?php echo $audioTitle; ?>
											<?php echo $audioAuthor; ?>
											<div class="audio-wrapper">
												<?php if( get_sub_field('source') == 'media' && get_sub_field('audio_file') <> '' ) { ?>
													<audio id="audio_<?php echo $i; ?>" class="audio-file" preload="none" controls>
														<?php
															$audio_file = get_sub_field('audio_file');
															echo '<source src="'.$audio_file['url'].'" type="'.$audio_file['mime_type'].'">';
														?>
													</audio>
												<?php } else if ( get_sub_field('source') == 'url' && get_sub_field('audio_url') <> '' ) { ?>
													<audio id="audio_<?php echo $i; ?>" class="audio-file" preload="none" controls>
														<?php
															echo '<source src="'.$audioURL.'" type="'.$mime_type.'">';
														?>
													</audio>
												<?php } ?>
											</div>
										</div>
									</div>
								<?php endwhile ?>
								</div>
							</div>
						<?php } else if( !empty($featuresThumbURL) ) { ?>
							<div class="post-images">
								<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<?php if ( class_exists( 'FLBuilderModel' ) && !FLBuilderModel::is_builder_enabled() ) {  ?><div class="container"><div class="row"><article class="contentbar col-lg-12"><?php } else { ?><article class="contentbar"><?php }?>
						<?php get_template_part('includes/post_advert_top'); ?>
						<?php the_content(); ?>
						<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer<?php if ( get_field('additional_information') == true ) { ?> hidden-sm-up<?php } ?>">
							<?php get_template_part('includes/post_navigation'); ?>
						</div>
						<?php get_template_part('includes/post_advert_bottom'); ?>
						<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
				<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?></article><?php } else { ?></article></div></div><?php } ?>
			
			<?php } else if ( $format == 'link' ) { ?>
				<div class="post-format-box"<?php if ( !empty($featuresThumbURL) ) { ?> style="background-image: url(<?php echo $featuresThumbURL; ?>);"<?php } ?>>
					<div class="container">
						<div class="row">
						<?php 
							$icon = get_field('icon');
							$bgIcon = ' background-image: url('.$icon['url'].');';
							$bgColor = ' background-color: '.get_field('bg_color').';';
							$txtColor = ' color: '.get_field('text_color').';';
							$linkStyle = ' style="'.$bgIcon.$bgColor.$txtColor.'"';
						?>
						<?php if ( get_field('source') == 'page' && get_field('link') ) {  ?>
							<div class="post-link">
								<a href="<?php echo get_field('link'); ?>"<?php echo $linkStyle; ?> title="<?php echo get_field('link_text'); ?>">
									<?php echo get_field('link_text'); ?>
									<span>link: <?php echo get_field('link'); ?></span>
								</a>
							</div>
						<?php } else if ( get_field('source') == 'url' && get_field('url') ) { ?>
							<div class="post-link">
								<a href="<?php echo get_field('url'); ?>"<?php echo $linkStyle; ?> title="<?php echo get_field('link_text'); ?>">
									<?php echo get_field('link_text'); ?>
									<span>link: <?php echo get_field('url'); ?></span>
								</a>
							</div>
						<?php } else if( !empty($featuresThumbURL) ) { ?>
							<div class="post-images">
								<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<?php if ( class_exists( 'FLBuilderModel' ) && !FLBuilderModel::is_builder_enabled() ) {  ?><div class="container"><div class="row"><article class="contentbar col-lg-12"><?php } else { ?><article class="contentbar"><?php }?>
						<?php get_template_part('includes/post_advert_top'); ?>
						<?php the_content(); ?>
						<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer<?php if ( get_field('additional_information') == true ) { ?> hidden-sm-up<?php } ?>">
							<?php get_template_part('includes/post_navigation'); ?>
						</div>
						<?php get_template_part('includes/post_advert_bottom'); ?>
						<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
				<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?></article><?php } else { ?></article></div></div><?php } ?>
			
			<?php } else if ( $format == 'quote' ) { ?>
				<div class="post-format-box"<?php if ( !empty($featuresThumbURL) ) { ?> style="background-image: url(<?php echo $featuresThumbURL; ?>);"<?php } ?>>
					<div class="container">
						<?php if ( get_field('quote') ) {  ?>
							<?php 
								if ( get_field('bg_color') ) $bgColor = ' background-color: '.get_field('bg_color').'; ';
								if ( get_field('text_color') ) $textColor = ' color: '.get_field('text_color').'; ';
								if ( get_field('bg_color') || get_field('text_color') ) $quoteStyle = ' style="'.$bgColor.$textColor.'"';
								if ( get_field('text_hightlight_color') ) $highlightStyle = '  style="color: '.get_field('text_hightlight_color').';"';
							?>
							<blockquote class="post-quote clearfix"<?php echo $quoteStyle; ?>>
								<div class="post-quote-msg"><span class="post-quote-msg-before">“</span><?php the_field('quote'); ?></div>
								<div class="post-quote-author">
									<?php 
										$avatar = get_field('avatar');
										if ( $avatar ) echo '<img class="post-quote-author-img" src="'.$avatar['url'].'" alt="'.$avatar['alt'].'">';
										if ( get_field('author') ) { 
											echo '<div class="post-quote-author-name">';
												echo get_field('author');
												if ( get_field('position') ) echo '<span class="post-quote-author-position"'.$highlightStyle.'>'.get_field('position').'</span>';
											echo '</div>';
										}
									?>
								</div>
							</blockquote>
						<?php } else if( !empty($featuresThumbURL) ) { ?>
							<div class="post-images">
								<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
							</div>
						<?php } ?>
					</div>
				</div>
				<?php if ( class_exists( 'FLBuilderModel' ) && !FLBuilderModel::is_builder_enabled() ) {  ?><div class="container"><div class="row"><article class="contentbar col-lg-12"><?php } else { ?><article class="contentbar"><?php }?>
						<?php get_template_part('includes/post_advert_top'); ?>
						<?php the_content(); ?>
						<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer<?php if ( get_field('additional_information') == true ) { ?> hidden-sm-up<?php } ?>">
							<?php get_template_part('includes/post_navigation'); ?>
						</div>
						<?php get_template_part('includes/post_advert_bottom'); ?>
						<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
				<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?></article><?php } else { ?></article></div></div><?php } ?>
			
			<?php } else if ( $format == 'status' ) { ?>
				<div class="post-format-box"<?php if ( !empty($featuresThumbURL) ) { ?> style="background-image: url(<?php echo $featuresThumbURL; ?>);"<?php } ?>>
					<div class="container">
						<?php if ( get_field('status') ) {  ?>
							<div class="post-status clearfix">
								<div class="post-status-inner"><?php the_field('status'); ?></div>
								<div class="post-status-inner-info"><?php esc_html_e('Status - Posted on'); ?> <?php the_time(esc_attr(get_option('chameleon_date_format'))) ?> <?php esc_html_e('by'); ?> <?php the_author_posts_link(); ?></div>
							</div>
						<?php } else if( !empty($featuresThumbURL) ) { ?>
							<div class="post-images">
								<img src="<?php echo $featuresThumbURL; ?>" alt="<?php the_title(); ?>">
							</div>
						<?php } ?>
					</div>
				</div>
				<?php if ( class_exists( 'FLBuilderModel' ) && !FLBuilderModel::is_builder_enabled() ) {  ?><div class="container"><div class="row"><article class="contentbar col-lg-12"><?php } else { ?><article class="contentbar"><?php }?>
						<?php get_template_part('includes/post_advert_top'); ?>
						<?php the_content(); ?>
						<div class="<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) echo 'container ';  ?> post-footer<?php if ( get_field('additional_information') == true ) { ?> hidden-sm-up<?php } ?>">
							<?php get_template_part('includes/post_navigation'); ?>
						</div>
						<?php get_template_part('includes/post_advert_bottom'); ?>
						<?php if (get_option('chameleon_show_postcomments') == 'on') comments_template('', true); ?>
				<?php if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_enabled() ) {  ?></article><?php } else { ?></article></div></div><?php } ?>
			
			<?php } ?>
		<?php endwhile; endif; ?>
	</div>
	</div>
</main>
<?php get_footer(); ?>