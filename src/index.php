<?php
	//Load in configuration variables from external file.
	include 'includes/config.php';

	//Connect to database and grab articles.
	$connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$selectQuery = "select Title, Content, Created from article order by created desc";
	
	//Load results into array for iteration later on in the page.
	$results = $connection	
		->query($selectQuery)
		->fetchAll(PDO::FETCH_OBJ);
	
	//We can now safely terminate the DB connection.
	$connection = null;
?>

<!doctype html>
<!-- Provide 'lang' attribute for benefit of crawlers and translation tooling etc. -->
<html lang="en">		

<head>
	<meta charset="utf-8">
	<title><?= BLOG_TITLE ?></title>
	<meta name="Description" content="<?= BLOG_DESCRIPTION ?>">

	<!-- Tell mobile platforms we support their form-factor, with appropriate initial scale. -->
	<meta name="viewport" content="width=device-width, initial-scale=0.75">

	<link href="/themes/<?= BLOG_THEME ?>/favicon.ico" rel="icon">
	<link href="/css/global.css" rel="stylesheet">
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

	<header>
		<div id="navContainer">
			<nav>
				<!-- Social links area -->
				<div id="socialLinks">
					<?php if(GITHUB_ENABLED) { ?>
						<a href="https://github.com/<?= GITHUB_REPO ?>" data-callout="Source code" target="_blank">
							<span class="fa fa-github"></span>
						</a>
					<?php } ?>
					<a href="//twitter.com/<?= TWITTER_HANDLE ?>" data-callout="@<?= TWITTER_HANDLE ?>" target="_blank">
						<span class="fa fa-twitter"></span>
					</a>
					<div class="callout top" style="display:none">
					</div>
				</div>

				<!-- Logo and blog title -->
				<img src='/themes/<?= BLOG_THEME ?>/images/logo.svg' id='logo'>
				<h1><?= BLOG_TITLE ?></h1>
			</nav>
		</div>
	</header>

	<div id="pageContainer">
		<div id="pageContent">

			<!-- Main blog article iteration -->
			<?php foreach($results as $row) { ?>
				<article>
					<h2><?= $row->Title ?></h2>
					
					<?= $row->Content ?>
				</article>
			<?php } ?>

			<!-- Twitter widget (if enabled) -->
			<?php if(TWITTER_WIDGET_ENABLED) { ?>
				<article>
					<a class="twitter-timeline" href="//twitter.com/<?= TWITTER_HANDLE ?>" data-chrome="noborders noheader nofooter" data-widget-id="<?= TWITTER_WIDGET_ID ?>"></a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
				</article>
			<?php } ?>

		</div>
	</div>
</body>
</html>