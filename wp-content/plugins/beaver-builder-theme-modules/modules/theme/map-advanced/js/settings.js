(function($){

	FLBuilder.registerModuleHelper('MapAdvancedModule', {

		rules: {
			address: {
				required: true
			},
			height: {
				required: true,
				number: true
			}
		},
		
	});

})(jQuery);