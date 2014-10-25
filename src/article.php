<?php
	ob_start();
	include 'includes/config.php';
	include 'includes/functions.php';
	$article = null;
	$querystringKey = 'title';

	if(isStringQueryString($querystringKey)) {
		//Connect to database and grab article.
		$connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
		$statement = $connection->prepare(
			"select Title, Content, Created from article where ShortName = :shortName"
		);
		$statement->execute(array(
			':shortName' => $_GET[$querystringKey]
		));
		$article = $statement->fetch(PDO::FETCH_OBJ);
		$connection = null;
	}

	if($article != null) {
		$pageTitle = $article->Title . ' - ' . BLOG_TITLE;

		//Include 'About' sidebar.
		include 'about.php';
?>

	<article>
		<header>
			<h2><?= $article->Title ?></h2>
			<time datetime='<?= $article->Created ?>'>
				<?= (new DateTime($article->Created))->format('Y-m-d, h:i a') ?>
			</time>
		</header>
		<?= $article->Content ?>
	</article>

<?php 
	} else { 
		//Serve back a 404.
		http_response_code(404);
		$pageTitle = 'Article not found' . ' - ' . BLOG_TITLE;
?>

	<section class='message'>
		<h2>Article not found</h2>
		<p>Please check the URL, otherwise this article may have been removed.</p>
	</section>

<?php
	}

	$pageContent = ob_get_contents();
	ob_end_clean();
	include("_master.php");
?>