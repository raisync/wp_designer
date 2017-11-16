jQuery(window).ready(function($){
	var currentVal = $('select#chameleon_header_style').find('option[selected]').html();
	$('select#chameleon_header_style').closest('.epanel-box').attr('data-header-style', currentVal);
	$('select#chameleon_header_style').on('change', function() {
		$(this).closest('.epanel-box').removeAttr('data-header-style').attr('data-header-style', this.value);
	})
	
	for(var i = 1; i <= 10; i++) {
		$('.epanel-box[data-header-style] ~ .epanel-box *[id*="chameleon_header_style_'+i+'"]').each( function() {
			$(this).closest('.epanel-box').removeAttr('data-header-style-setting').attr('data-header-style-setting', 'header-style-'+i);
		})
	}
});