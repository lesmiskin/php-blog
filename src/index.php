<?php
	ob_start();

	include 'includes/config.php';
	include 'includes/functions.php';

	$results = dbAtomicSelect(
		"select Title, ShortName, Content, Created from article order by created desc"
	);
?>

<!-- Main blog content -->
<div id="bodyColumn">
<?php
	foreach($results as $article) {
		include '_article.php';		//leverages $article
	}
?>
</div>

<!-- Sidebar -->
<div id="sideColumn">
	<?php include '_about.php'; ?>
	<?php include '_archive.php'; ?>
</div>

<?php
	//Twitter widget (if enabled).
	if(TWITTER_ENABLED) { ?>
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
