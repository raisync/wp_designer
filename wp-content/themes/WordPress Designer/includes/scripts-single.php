<?php if ( is_single() ) { ?>
<script type="text/javascript">
	(function($) {
		$(function() {
			/*social media icons*/
			if ($('.social-share-icons').length ) { 
				$('.social-share-icons .popup').click(function(event) {
					event.preventDefault();
					if ( $(this).attr('data-popup') == 'facebook' ) {
						var left  = ($(window).width()/2)-(600/2), top = ($(window).height()/2)-(300/2);
						window.open ($(this).attr("href"), "popupWindow", "width=600, height=300, top="+top+", left="+left);
					} else if ( $(this).attr('data-popup') == 'twitter' ) {
						var left  = ($(window).width()/2)-(600/2), top = ($(window).height()/2)-(255/2);
						window.open ($(this).attr("href"), "popupWindow", "width=600, height=255, top="+top+", left="+left);
					} else if ( $(this).attr('data-popup') == 'google' ) {
						var left  = ($(window).width()/2)-(400/2), top = ($(window).height()/2)-(600/2);
						window.open ($(this).attr("href"), "popupWindow", "width=400, height=600, top="+top+", left="+left);
					} else if ( $(this).attr('data-popup') == 'linkedin' ) {
						var left  = ($(window).width()/2)-(1000/2), top = ($(window).height()/2)-(700/2);
						window.open ($(this).attr("href"), "popupWindow", "width=1000, height=700, top="+top+", left="+left);
					} else {
						var left  = ($(window).width()/2)-(600/2), top = ($(window).height()/2)-(600/2);
						window.open ($(this).attr("href"), "popupWindow", "width=600, height=600, top="+top+", left="+left);
					}
				});
				var $sticky = $('.social-share-icons');
				var $stickyrStarter = $('#content').offset().top;
				var $stickyrStopper = $('#comment-wrap').offset().top;
				$(window).scroll(function() {
					var windowTop = $(window).scrollTop();
					if ($stickyrStarter > windowTop) {
						$sticky.removeClass('sticky-social');
					} else if ($stickyrStopper > windowTop) {
						$sticky.addClass('sticky-social');
					} else {
						$sticky.removeClass('sticky-social');
					}
				});
			}
			if ($('#respond #reply-title').length ) { 
				var respondTitle = $('#respond #reply-title').html();
				$('#respond #reply-title').after('<div class="h3" id="reply-title">'+respondTitle+'</div>');
				$('#respond h3#reply-title').remove();
			}
			
			if ($('.meta-info .article-category').length ) { 
				$(".meta-info .article-category a").each(function () {
					var widgetCatLink = $(this).attr('href');
					$(this).attr("onclick","javascript:location.href='"+widgetCatLink+"'");
					$(this).removeAttr('href');
				});
			}
			
			if ($('.comment-form-comment > label').length ) { 
				$(".comment-form-comment > label").each(function () {
					$(this).append(' <span class="required" aria-required="true">*</span>');
				});
			}
			
			<?php if ( get_post_format() == 'image' ) { ?>
				if ($('.post-images').length ) {
					var owl = $(".post-images.owl-carousel");
					owl.owlCarousel({ 
						<?php if ( get_post_format() == 'image' && get_field('style') == 'carousel' ) { ?>
						margin: 10,
						<?php } else if ( get_field('style') == 'slider' ) { ?>
						margin: 0,
						<?php } ?>
						items:1,
						loop: true,
						dots: true,
						nav: true,
						autoHeight: true,
						navText: ['',''],
						autoplay: true,
						autoplayTimeout: 1500,
						autoplaySpeed: 1500,
						dragEndSpeed: 1500,
						dotsSpeed: 1500,
						navSpeed: 1500,
						fluidSpeed: 1500,
						smartSpeed: 1500,
						<?php if ( get_post_format() == 'image' && get_field('style') == 'carousel' ) { ?>
						responsive:{
							0:{
								stagePadding: 50,
							},
							600:{
								stagePadding: 100,
							},
							768:{
								stagePadding: 200,
							},
							1080:{
								stagePadding: 250,
							}
						}
						<?php } ?>
					});
				}
			<?php } ?>
			<?php if ( get_post_format() == 'gallery' ) { ?>
				<?php if ( class_exists( 'LightGallery' ) ) { ?>
					if ($('.post-images.gallery').length ) {
						var $lightboxGallery = $(".post-images.gallery"),
							$lightboxGalleryID = 'gallery-<?php echo $post->ID; ?>';
						$lightboxGallery.lightGallery({
							thumbnail:true,
							showThumbByDefault: true,
							selector: '.item',
							subHtmlSelectorRelative: true,
							exThumbImage: 'data-thumb',
							galleryId: $lightboxGalleryID
						});
					}
				<?php } ?>
			<?php } ?>
			<?php if ( get_post_format() == 'video' ) { ?>
				var $carousel = $('.video-carousel').flickity({prevNextButtons: false, pageDots: false, draggable: false});
				var $carouselNav = $('.video-carousel-nav');
				var $carouselNavCells = $carouselNav.find('.video-carousel-cell');
				$carouselNav.on( 'click', '.video-carousel-cell', function( event ) {
				  var index = $( event.currentTarget ).index();
				  $carousel.flickity( 'select', index );
				});
				var flkty = $carousel.data('flickity');
				var navTop  = $carouselNav.position().top;
				var navCellHeight = $carouselNavCells.height();
				var navHeight = $carouselNav.height();
				$carousel.on( 'select.flickity', function() {
				  $carouselNav.find('.is-nav-selected').removeClass('is-nav-selected');
				  var $selected = $carouselNavCells.eq( flkty.selectedIndex )
					.addClass('is-nav-selected');
				  var scrollY = $selected.position().top +
					$carouselNav.scrollTop() - ( navHeight + navCellHeight ) / 2;
				  $carouselNav.animate({
					scrollTop: scrollY
				  });
				});
				$(".video-carousel .video-carousel-cell").each(function () {
					var posterurl = $(this).find('video').attr('poster');
					$(this).find('video').mediaelementplayer({
						poster: posterurl,
						showPosterWhenEnded: true,
						showPosterWhenPaused: true,
						hideVideoControlsOnPause: true,
						hideVideoControlsOnLoad: true,
					});
				});
			<?php } ?>
			<?php if ( get_post_format() == 'audio' ) { ?>
				$('audio').mediaelementplayer();
			<?php } ?>
		});
	})(jQuery);
</script>
<?php } ?>