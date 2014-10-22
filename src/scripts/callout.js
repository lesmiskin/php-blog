function loadSocialLinkCallouts() {
	var callout = $('#socialLinks .callout');

	// Icon callouts
	$('#socialLinks a').hover(
		function() { 
			//Write contents of caption from data attribute on icon
			var dataCaption = $(this).data('callout');
			callout.text(dataCaption);
			var offset = $(this).offset().left - (callout.width()) + 12;
			callout.css('left', offset);
			callout.show(); 
		},
		function() { 
			callout.hide(); 
		}
	);
}
