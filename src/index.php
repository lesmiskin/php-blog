<?php
	ob_start();

	//Load in configuration variables from external file.
	include 'includes/config.php';

	//Connect to database and grab articles.
	$connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$selectQuery = 
		"select Title, Content, Created from article order by created desc";
	$results = $connection->query($selectQuery)->fetchAll(PDO::FETCH_OBJ);
	$connection = null;

	//Include 'About' sidebar.
	include '_about.php';

	// Main blog article iteration
	foreach($results as $article) {
		include '_article.php';		//leverages $article
	}

	//Twitter widget (if enabled).
	if(TWITTER_WIDGET_ENABLED) { ?>
		<article>
			<a class="twitter-timeline" href="//twitter.com/<?= TWITTER_HANDLE ?>" data-chrome="noborders noheader nofooter" data-widget-id="<?= TWITTER_WIDGET_ID ?>"></a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
		</article>
	<?php 
	}

	$pageContent = ob_get_contents();
	ob_end_clean();
	$pageTitle = BLOG_TITLE;
	include '_master.php';
?>