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
?>