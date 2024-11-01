(function( $ ) {
	var $body = $( 'body' );
	if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		$body.addClass('wcc-onmobile');
	}
	else{
		$body.addClass('wcc-ondesktop');
	}

	$('.wcss-all-network-link').on('click', function (e) {
		e.preventDefault();
		$('body').toggleClass('wcss-popup-enable');
	});

	jQuery(document).on('click', function (e) {
		var container = jQuery(".wcss-all-networks-container .wcss-popup-wrapper");
		var wcssLink = jQuery(".wcss-all-network-link");
		if (!container.is(e.target) && !wcssLink.is(e.target) && container.has(e.target).length === 0){
			jQuery('body').removeClass('wcss-popup-enable');
		}
	});

	$('.wcss-close-btn').on('click', function (e) {
		e.preventDefault();
		jQuery('body').removeClass('wcss-popup-enable');
	});

})( jQuery );

function wcss_load_popup(e){
	var share_href=e.href;
	var top = (screen.availHeight - 500) / 2;
	var left = (screen.availWidth - 500) / 2;
	var popup = window.open(
			share_href,
			'social sharing',
			'width=550,height=420,left='+ left +',top='+ top +',location=0,menubar=0,toolbar=0,status=0,scrollbars=1,resizable=1'
	);
	return false;
}