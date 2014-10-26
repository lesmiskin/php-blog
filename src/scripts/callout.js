"use strict";

function loadCallouts() {
	var callout = $('.callout');

	// Icon callouts
	$('.hasCallout').hover(
		function() { 
			//Write contents of caption from data attribute on icon
			var dataCaption = $(this).data('callout');
			callout.text(dataCaption);

			//Figure out where to put it onscreen.
			var newTop = $(this).offset().top + callout.height();
			var newLeft = $(this).offset().left - (callout.width() / 2);

			//Position it accordingly, and show it.
			callout.css('top', newTop);
			callout.css('left', newLeft);
			callout.show();
		},
		function() { 
			callout.hide(); 
		}
	);
}

$(function() {
	loadCallouts();
});