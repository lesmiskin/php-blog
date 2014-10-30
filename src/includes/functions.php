<?php
	function formatDate($dateTime) {
		return (new DateTime($dateTime))->format('Y-m-d, h:i a');
	}

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

	function getPostData($keyName) {
		return $_POST[$keyName];
	}

	function httpIsGet() {
		return $_SERVER['REQUEST_METHOD'] == 'GET';
	}

	function httpIsPost() {
		return $_SERVER['REQUEST_METHOD'] == 'POST';
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

	function getQueryString($keyName) {
		return $_GET[$keyName];
	}

	function dbAtomicQuery($sql, $parameters = null, $hasOutput = true, $singleRowOutput = false) {
		$output = null;

		//Connect and execute query, safely adding parameters if necessary.
		$connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$statement = $connection->prepare($sql);
		$statement->execute($parameters);

		//If we're expecting output - run Fetch command.
		if($hasOutput) {
			$fetchInto = PDO::FETCH_OBJ;

			//Change fetch strategy if we're expecting just one row back.
			if($singleRowOutput) {
				$output = $statement->fetch($fetchInto);
			}else{
				$output = $statement->fetchAll($fetchInto);
			}
		}

		//Close connection (here's the atomic part), now that
		//we've saved the results to a variable.
		$connection = null;

		return $output;
	}

	//Convenience method for dbAtomicQuery
	function dbAtomicSelectSingle($sql, $parameters = null){
		return dbAtomicQuery($sql, $parameters, true, true);
	}

	function dbAtomicSelect($sql, $parameters = null){
		return dbAtomicQuery($sql, $parameters, true, false);
	}

	function dbAtomicNoOutput($sql, $parameters = null){
		return dbAtomicQuery($sql, $parameters, false);
	}

	function redirect($url) {
		header('location: ' . $url);
	}
?>
