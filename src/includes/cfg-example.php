<?php
	//Blog constants, modify as necessary.
	const BLOG_TITLE = 				'Example Blog';
	const BLOG_THEME = 				'example';

	const DB_DSN = 					'mysql:host=127.0.0.1;dbname=blog';
	const DB_USERNAME = 			'username';
	const DB_PASSWORD = 			'password';

	const TWITTER_HANDLE = 			'example';
	const TWITTER_WIDGET_ENABLED = 	false;
	const TWITTER_WIDGET_ID = 		'12345';

	//Enable error display for debugging purposes (disable in production!)
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
?>