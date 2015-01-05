<?php
	//Blog constants, modify as necessary.
	const BLOG_TITLE = 				'Example Blog';
	const BLOG_THEME = 				'example';
	const BLOG_DESCRIPTION = 		'All your blogs are belong to us.';
	const BLOG_ABOUT_TITLE = 		'About';
	const BLOG_ABOUT_PROFILE = 		'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.';
	const BLOG_URL = 				'https://example.com';
	const BLOG_EMAIL = 				'user@nospam.example.com';

	const DB_DSN = 					'mysql:host=127.0.0.1;dbname=blog';
	const DB_USERNAME = 			'username';
	const DB_PASSWORD = 			'password';

	const TWITTER_ENABLED = 			false;
	const TWITTER_HANDLE = 				'';
	const TWITTER_WIDGET_ID = 			'';
	const TWITTER_MAX_CHARS = 			140;
	const TWITTER_MAX_SHORTENED_URL = 	23;
	const TWITTER_SHARE_PREFIX = 		'https://twitter.com/home?status=';

	const LINKEDIN_HANDLE = 			'';
	const INSTAGRAM_HANDLE = 			'';
	const FACEBOOK_SHARE_PREFIX = 		'https://www.facebook.com/sharer/sharer.php?u=';

	const GITHUB_ENABLED = 			false;
	const GITHUB_REPO = 			'';

	const GA_ENABLED = 				false;
	const GA_ID = 					'';

	date_default_timezone_set('NZ');

	//Enable error display for debugging purposes (disable in production!)
	ini_set('display_startup_errors',1);
	ini_set('display_errors',1);
	error_reporting(-1);
?>