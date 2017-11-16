<?php 
	$blogname = str_replace('&amp;', 'n', get_bloginfo( 'name' )); 
	$hashtag = strtolower(str_replace(' ', '', $blogname)); 
	if ( get_option('chameleon_hashtag') <> '' ) {
		$hashtag = get_option('chameleon_hashtag');
	}
?>
<div class="social-share-icons">
	<ul>
		<li class="facebook">
			<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&display=popup&ref=plugin&src=like&kid_directed_site=0" class="popup" data-popup="facebook">
				<i aria-hidden="true" class="fa fa-facebook"></i>
			</a>
		</li>
		<li class="twitter">
			<a href="https://twitter.com/share?url=<?php the_permalink(); ?>&amp;text=<?php the_title(); ?>&amp;hashtags=<?php echo $hashtag; ?>" class="popup" data-popup="twitter">
				<i aria-hidden="true" class="fa fa-twitter"></i>
			</a>
		</li>
		<li class="google">
			<a href="https://plus.google.com/share?url=<?php the_permalink(); ?>" class="popup" data-popup="google">
				<i aria-hidden="true" class="fa fa-google-plus"></i>
			</a>
		</li>
		<li class="linkedin">
			<a href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>" class="popup" data-popup="linkedin">
				<i aria-hidden="true" class="fa fa-linkedin"></i>
			</a>
		</li>
		<li class="digg">
			<a href="http://www.digg.com/submit?url=<?php the_permalink(); ?>" class="popup">
				<i aria-hidden="true" class="fa fa-digg"></i>
			</a>
		</li>
		<li class="pinterest">
			<a href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());">
				<i aria-hidden="true" class="fa fa-pinterest-p"></i>
			</a>
		</li>
		<li class="reddit-alien">
			<a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="popup">
				<i aria-hidden="true" class="fa fa-reddit-alien"></i>
			</a>
		</li>
		<li class="stumbleupon">
			<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="popup">
				<i aria-hidden="true" class="fa fa-stumbleupon"></i>
			</a>
		</li>
		<li class="tumblr">
			<a href="http://www.tumblr.com/share/link?url=<?php the_permalink(); ?>&amp;title=<?php the_title(); ?>" class="popup">
				<i aria-hidden="true" class="fa fa-tumblr"></i>
			</a>
		</li>
		<li class="vkontakte">
			<a href="http://vkontakte.ru/share.php?url=<?php the_permalink(); ?>" class="popup">
				<i aria-hidden="true" class="fa fa-vk"></i>
			</a>
		</li>
	</ul>
	<script type="text/javascript">
		(function($) {
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
		})(jQuery);
	</script>
</div>