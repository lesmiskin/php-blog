<!doctype html>
<!-- Provide 'lang' attribute for benefit of crawlers and translation tooling etc. -->
<html lang="en">		

<head>
	<meta charset="utf-8">
	<title><?= $pageTitle ?></title>
	<meta name="Description" content="<?= BLOG_DESCRIPTION ?>">

	<!-- Tell mobile platforms we support their form-factor, with appropriate initial scale. -->
	<meta name="viewport" content="width=device-width, initial-scale=0.75">

	<link href="/themes/<?= BLOG_THEME ?>/favicon.ico" rel="icon">
	<link href="/css/global.css" rel="stylesheet">
	<link href="/themes/<?= BLOG_THEME ?>/theme.css" rel="stylesheet">
	<link href="/css/callout.css" rel="stylesheet">
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script async src="/scripts/callout.js"></script>

	<!-- HTML5 shim for IE9 and below. -->
	<!--[if lt IE 9]>
		<script async src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script async src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- Google Analytics -->
	<?php if(GA_ENABLED) { ?>
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

			ga('create', '<?= GA_ID ?>', 'auto');
			ga('send', 'pageview');
		</script>
	<?php } ?>
</head>
<body>

	<div class="callout top">
	</div>

	<header id="pageHeader">
		<div id="navContainer">
			<nav>
				<!-- Social links area -->
				<div id="socialLinks" class="icons">
					<a href="mailto:<?= BLOG_EMAIL ?>" class="hasCallout" data-callout="Email" target="_blank">
						<span class="fa fa-at"></span>
					</a>
					<a href="//twitter.com/<?= TWITTER_HANDLE ?>" class="hasCallout" data-callout="@<?= TWITTER_HANDLE ?>" target="_blank">
						<span class="fa fa-twitter"></span>
					</a>
					<a href="//instagram.com/<?= INSTAGRAM_HANDLE ?>" class="hasCallout" data-callout="Instagram" target="_blank">
						<span class="fa fa-instagram"></span>
					</a>
					<a href="//linkedin.com/pub/<?= LINKEDIN_HANDLE ?>" class="hasCallout" data-callout="LinkedIn" target="_blank">
						<span class="fa fa-linkedin"></span>
					</a>
					<?php if(GITHUB_ENABLED) { ?>
						<a href="https://github.com/<?= GITHUB_REPO ?>" class="hasCallout" data-callout="Source code" target="_blank">
							<span class="fa fa-github"></span>
						</a>
					<?php } ?>
				</div>

				<!-- Logo and blog title -->
				<a href='/'>
					<img src='/themes/<?= BLOG_THEME ?>/images/logo.svg' id='logo'>
				</a>
				<h1><?= BLOG_TITLE ?></h1>
			</nav>
		</div>
	</header>

	<div id="pageContainer">
		<div id="pageContent">
			<?= $pageContent ?>
		</div>
	</div>
</body>
</html>