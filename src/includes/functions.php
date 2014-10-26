<?php
	function isIntegerQueryString($querystring) {
		return 
			isset($_GET[$querystring]) &&
			!empty($_GET[$querystring]) &&
			ctype_digit($_GET[$querystring]);
	}

	function isStringQueryString($querystring) {
		return 
			isset($_GET[$querystring]) &&
			!empty($_GET[$querystring]);
	}

	function makeFacebookShareUrl($relativeUrl) {
		return FACEBOOK_SHARE_PREFIX . BLOG_URL . $relativeUrl;
	}

	function makeTwitterShareURL($relativeUrl, $caption) {
		$url = BLOG_URL . $relativeUrl;
		$captionEllipsis = '... ';
		$captionSpacer = ' - ';
		$useCaption = $caption;
		$useSpacer = $captionSpacer;

		//If we overflow past tweet char limit, shorten title accordingly.
		if(strlen($caption) + strlen($captionSpacer) + TWITTER_MAX_SHORTENED_URL > TWITTER_MAX_CHARS) {
			$captionLength = TWITTER_MAX_CHARS - TWITTER_MAX_SHORTENED_URL - strlen($captionEllipsis);
			$useCaption = substr($caption, 0, $captionLength);
			$useSpacer = $captionEllipsis;
		}

		return TWITTER_SHARE_PREFIX . $useCaption . $useSpacer . $url;
	}
?>
