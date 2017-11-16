jQuery(window).ready(function($){
	var $window = $(window),
		$html = $('html');
	$window.resize(function resize() {
		var deviceAgent = navigator.userAgent.toLowerCase();
		var agentIDmobile = deviceAgent.match(/(android|iphone|ipad|ipod)/);
		var agentIDios = deviceAgent.match(/(iphone|ipod|ipad)/);
		var agentIDandroid = deviceAgent.match(/(android)/);
		if (agentIDmobile) { 	$html.addClass('mobile'); $html.removeClass('desktop'); }  	else { $html.removeClass('mobile'); $html.addClass('desktop'); }
		if (agentIDios) { 		$html.addClass('ios'); } 	 									else { $html.removeClass('ios'); }
		if (agentIDandroid) { 	$html.addClass('android'); } 									else { $html.removeClass('android'); }
		/*Mobile Classes*/
		if ( $window.width() < 1025 ) {
			$html.addClass('mobile');
			$html.removeClass('desktop');
		} else {
			$html.removeClass('mobile');
			$html.addClass('desktop');
		}
		var currentUserAgent = navigator.userAgent;
		if (currentUserAgent.indexOf("AppleWebKit") >= 0) {
			var androidVersion = parseFloat(currentUserAgent.slice(currentUserAgent.indexOf("AppleWebKit") + 12));
			if (androidVersion < 535) {
				$html.addClass('old-browser'); // for Window Safari, Tab 3 Jellybean - Webview Browser and other Andriod 4.4 and below
			}
		}
		if (currentUserAgent.indexOf("Trident") >= 0) {
			$html.addClass('ie'); // for Windows Microsoft Edge
		}
		if (currentUserAgent.indexOf("Edge") >= 0) {
			$html.addClass('ie ie-edge'); // for Windows Microsoft Edge
		}
	}).trigger('resize');
});