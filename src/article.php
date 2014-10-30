<?php
	ob_start();
	include 'includes/config.php';
	include 'includes/functions.php';

	$article = dbAtomicSelectSingle(
		"select Title, ShortName, Content, Created from article where ShortName = :shortName",
		array(
			':shortName' => getQueryString('title')
		)
	);

	if($article != null) {
		$pageTitle = $article->Title . ' - ' . BLOG_TITLE;
?>

<!-- Main blog content -->
<div id="bodyColumn">
	<?php include '_article.php' ?>
</div>

<!-- Sidebar -->
<div id="sideColumn">
	<?php include '_about.php'; ?>
</div>

<?php
	} 
	else { 
		//Serve back a 404.
		http_response_code(404);
		$pageTitle = 'Article not found' . ' - ' . BLOG_TITLE;
?>
<div id="bodyColumn">
	<section class='message'>
		<h2>Article not found</h2>
		<p>Please check the URL, otherwise this article may have been removed.</p>
	</section>
</div>
<?php
	}

	$pageContent = ob_get_contents();
	ob_end_clean();
	include("_master.php");
?>