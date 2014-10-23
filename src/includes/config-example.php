<?php
	//Blog constants, modify as necessary.
	const BLOG_TITLE = 				'Example Blog';
	const BLOG_THEME = 				'example';

	const DB_DSN = 					'mysql:host=127.0.0.1;dbname=blog';
	const DB_USERNAME = 			'username';
	const DB_PASSWORD = 			'password';

	const TWITTER_ENABLED = 		false;
	const TWITTER_HANDLE = 			'';
	const TWITTER_WIDGET_ID = 		'';

	const GITHUB_ENABLED = 			false;
	const GITHUB_REPO = 			'';

	const GA_ENABLED = 				false;
	const GA_ID = 					'';

	//Enable error display for debugging purposes (disable in production!)
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
?>