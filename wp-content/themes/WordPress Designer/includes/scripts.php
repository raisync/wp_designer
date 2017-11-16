<script type="text/javascript">
(function($) {
	$(function() {
		/*if admin-bar*/
		<?php if ( is_admin_bar_showing() ) { ?>
		if ($('.admin-bar').length ) {
			$('html').addClass('admin-bar-enable');
		}
		<?php } ?>
		
		/*search toggle*/
		if ($('#header-search').length ) {
			var htmlClick = true;
			$('#header-search > button').click(function(){ 
				if ($('#header-search').hasClass('toggled')) {
					$('#header-search').removeClass('toggled');
				} else {
					$('#header-search').addClass('toggled');
				}
				setTimeout(function(){
					$('#search-box-input').focus();
					$('#search-box-submit').attr('disabled', true);
					function validateValue() {
						if($('#search-box-input').val().length !=0) {
							$('#search-box-submit').attr('disabled', false);
						} else {
							$('#search-box-submit').attr('disabled',true);
						}
					}
					validateValue();
					$('#search-box-input').keyup(function(){
						validateValue();
					})
				}, 100);
				htmlClick = false;
			});
			$('#header-search').click(function(){ 
				htmlClick = false;
			});
			$("html").click(function () {
				if ( htmlClick ) {
					$('#header-search').removeClass('toggled');
				}
				htmlClick = true;
			});
		}
		
		
		if ($('.page-heading-inner').length ) {
			var $window = $(window);
			$window.resize(function resize() {
				var titleHeight = $('.page-heading-content').outerHeight();
				$('.page-heading-inner .container-fluid').css('height', titleHeight);
			}).trigger('resize');
		}
			
			
		if ($('.tilter').length ) {
			$('.tilter').hover(   
				function () {
					var $this = $(this);
					$this.addClass('mouse-enter');
					setTimeout(function() {
						$this.removeClass('mouse-enter');
					}, 300); // 2000 is in mil sec eq to 2 sec.
				},
				function () {
					$(this).removeClass('mouse-enter');
				}
			);
			var tiltSettings = [{
				movement: {
					imgWrapper : {
						translation : {x: -50, y: -50, z: 30},
						rotation : {x: 0, y: -10, z: 5},
						reverseAnimation : {duration : 2000, easing : 'easeOutQuad'}
					},
					lines : {
						translation : {x: 100, y: 10, z: [0,70]},
						rotation : {x: 0, y: 0, z: 0},
						reverseAnimation : {duration : 2000, easing : 'easeOutExpo'}
					},
					caption : {
						translation : {x: -200, y: -30, z: 70},
						rotation : {x: -10, y: -30, z: -5},
						reverseAnimation : {duration : 800, easing : 'easeOutQuad'}
					},
					overlay : {
						translation : {x: 0, y: -50, z: -30},
						rotation : {x: 0, y: 0, z: 0},
						reverseAnimation : {duration : 500, easing : 'easeOutExpo'}
					}
				}
			}];
			function tilter() {
				var idx = 0;
				[].slice.call(document.querySelectorAll('.tilter')).forEach(function(el, pos) { 
					idx = pos%2 === 0 ? idx+1 : idx;
					new TiltFx(el, tiltSettings[idx-1]);
				});
			}
			tilter();
		}
		
		/*sticky on scroll header*/
		if ($('body.header-sticky-on-scroll #header').length ) {
			var $window = $(window);
			$window.resize(function resize() {
				var headerHeight = $('#header').innerHeight(),
					headerOuterHeight = $('#header').outerHeight(),
					bypassDiv = parseInt(headerHeight),
					targetDiv = '';
					setTimeout(function(){
						$window = $(window);
						if ($('body.header-sticky-on-scroll #header + nav + #content .fl-builder-content > .fl-row:first-child + div').length ) {
							targetDiv = $('body.header-sticky-on-scroll #header + nav + #content .fl-builder-content > .fl-row:first-child + div').offset().top;
						} else if ($('body.header-sticky-on-scroll #header + nav + .page-heading + #content').length ) {
							targetDiv = $('body.header-sticky-on-scroll #header + nav + .page-heading + #content').offset().top;
						} else {
							targetDiv = $('#content-area').offset().top;
						}
						$window.scroll(function() {
							if ( $window.scrollTop() > bypassDiv ) {
								$('body.header-sticky-on-scroll #header').addClass('sticky-ready');
							} else {
								$('body.header-sticky-on-scroll #header').removeClass('sticky-ready')
							}
							if ( $window.scrollTop() > (bypassDiv*2) ) {
								$('body.header-sticky-on-scroll #header').addClass('sticky-ready-onset')
							} else {
								$('body.header-sticky-on-scroll #header').removeClass('sticky-ready-onset')
							}
							if ( $window.scrollTop() > ((bypassDiv*2) + targetDiv) ) {
								$('body.header-sticky-on-scroll #header').addClass('sticky-ready-done')
							} else {
								$('body.header-sticky-on-scroll #header').removeClass('sticky-ready-done')
							}
						});
					}, 100);
			}).trigger('resize');
		}
		
		/*bootstrap tooltips - social media icons*/
		if ($('[data-toggle="tooltip"]').length ) {
			$('[data-toggle="tooltip"]').tooltip();
		}

		/*Toggle Menu*/
		$('#primary-menu li.menu-item-has-children > a').after('<span class="menu-arrow"><i class="fa fa-angle-down" aria-hidden="true"></i></span>')
		$('html').on('click', '#responsive-menu, body.toggle-menu-show', function(event){ responsive_open($(this)); });
		$('body').append('<button id="responsive-menu-overlay" aria-label="MENU OVERLAY" />');
		$('#responsive-menu-wrapper').click(function(event){ event.stopPropagation(); });
		function responsive_open(button) {
			if ($('#header, body').hasClass('toggle-menu-show')) {
				$('#header, body').addClass('animate-out');
				button.addClass('animate-out').removeClass('animate');
				setTimeout(function() {
					$('#header, body').removeClass('toggle-menu-show animate-out');
					button.removeClass('animate-out');
				}, 400);
			} else {
				$('#header, body').addClass('toggle-menu-show');
				button.addClass('toggle-menu-show');
				setTimeout(function() {
					$('#header, body').addClass('animate');
				}, 600);
			}
		}
		$('#responsive-menu-wrapper a').each(function(){
			var dataLink = $(this).attr('href');
			$(this).attr("onclick", "location.href='"+dataLink+"'");
			$(this).removeAttr('href');
		});
		
		$('#primary-menu > li > a[href*="#"]').click(function(event){ event.stopPropagation(); submenu_toggle_bank($(this)); });
		function submenu_toggle_bank(submenu) {
			if (submenu.parent().hasClass('show-sub')) {
				submenu.parent().removeClass('show-sub');
			} else {
				submenu.parent().addClass('show-sub');
			}
			if (submenu.siblings().hasClass('active')) {
				submenu.siblings().removeClass('active');
			} else {
				submenu.siblings().addClass('active');
			}
		}
		$('#primary-menu li.menu-item-has-children span.menu-arrow').click(function(event){ event.stopPropagation(); submenu_toggle($(this)); });
		function submenu_toggle(submenu) {
			if (submenu.parent().hasClass('show-sub')) {
				submenu.parent().removeClass('show-sub');
			} else {
				submenu.parent().addClass('show-sub');
			}
			if (submenu.hasClass('active')) {
				submenu.removeClass('active');
			} else {
				submenu.addClass('active');
			}
		}

		/*Widget Search*/
		if ($('#sidebar #searchform').length ) { 
			$('#sidebar #searchform input').attr('aria-label', 'Search Entry');
			$('#sidebar #searchform #searchsubmit').remove(); 
			$('#sidebar #searchform').append('<button id="searchsubmit" aria-label="SEARCH"><i class="fa fa-search" aria-hidden="true"></i></button>'); 
		}

		/* BacktoTop */
		$('#footer').after('<button class="back-to-top" type="button" aria-label="BACK TO TOP">');
		var offset = 500,
		offsetOpacity = 500,
		scrollTopDuration = 700,
		$backToTop = $('.back-to-top');
		$(window).scroll(function(){
			( $(window).scrollTop() > offset ) ? $backToTop.addClass('backtotop-is-visible') : $backToTop.removeClass('backtotop-is-visible backtotop-hide');
			if( $(window).scrollTop() > offsetOpacity ) {
				$backToTop.addClass('backtotop-hide');
			}
		});
		$backToTop.on('click', function(e){
			e.preventDefault();
			$('body, html').animate({
				scrollTop: 0,
				}, scrollTopDuration
			);
		});

		/* Smooth navigator being used */
		$(".hav").click(function() {
			$('html, body').animate({
				scrollTop: $("#hire-a-va").offset().top
			}, 800);
		});

		$(".wwd").click(function() {
			$('html, body').animate({
				scrollTop: $("#what-we-do").offset().top
			}, 700);
		});

		$(".cu").click(function() {
			$('html, body').animate({
				scrollTop: $("#contact-us").offset().top
			}, 1000);
		});

		// responsive menu
		$('.nav').click(function(){
		  $(this).toggleClass('responsive');
		});

		/*Smooth navigator*/
		$('html:not(.fl-builder-edit) a[href*="#"]:not([href="#"])').click(function() {
			if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			  var target = $(this.hash);
			  target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
			  if (target.length) {
				$('html, body').animate({
				  scrollTop: target.offset().top
				}, 1000);
				return false;
			  }
			}
		});
		
		/*Search*/
		if ($('#header-search').length ) {
			$('#header-search').submit(function(event) {
			   if ($(this).find('input').val() == '') {
				  event.preventDefault();
			   }
			});
		}
		if ($('#searchform').length ) {
			$('#searchform').submit(function(event) {
			   if ($(this).find('input').val() == '') {
				  event.preventDefault();
			   }
			});
		}
		if ($('#searchform-404').length ) {
			$('#searchform-404').submit(function(event) {
			   if ($(this).find('input').val() == '') {
				  event.preventDefault();
			   }
			});
		}

		/*Auto Add alt for gallery*/
		if ($('.gallery[id^="gallery"]').length ) {
			$('.gallery[id^="gallery"] .gallery-item a img').each(function () {
				if ($(this).attr('alt')) {
				} else {
					$(this).removeAttr('alt');
					var newAlt = $(this).closest('a').attr('data-slb-asset');
					$(this).attr('alt', 'gallery-item-'+newAlt);
				}
			});
		}
		
		
		if ($('.gform_wrapper').length ) {
			function gfield_for_ajax() {
				if ($('.ginput_container_textarea').length ) {
					$('.ginput_container_textarea').each(function () {
						$(this).closest('.gfield').addClass('gfield_textarea');
					});
				}
				if ($('.gform_wrapper.gform_validation_error').length ) {
					setTimeout(function(){
						$('.gform_wrapper.gform_validation_error').addClass('show_gform_validation');
					}, 600);	
				}
			}
			gfield_for_ajax();
			$(document).bind('gform_post_render', function(){
				gfield_for_ajax();
			});
		}

		<?php if ( !is_front_page() ) { ?>
			parallax = skrollr.init({
				forceHeight: false,
				smoothScrollingDuration: 1000,
			});
			setTimeout(function(){
				parallax.refresh();
				$('.parallax').closest('.fl-col-group').addClass('parallax-wrapper');
				if (parallax.isMobile()) {
					parallax.destroy();
				}
			}, 2000);
		<?php } ?>
	});
})(jQuery);
</script>

<!--Plugins Script-->
<?php include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); 
if ( is_plugin_active( 'selection-sharer/selection-sharer.php' ) ) { ?>
<script>
	(function($) {
		$(function() {
			$(document).ready(function() {
				$('p, h1, h2, h3, h4, h5, div').selectionSharer();
			});
		});
	})(jQuery);
</script>
<?php }?>