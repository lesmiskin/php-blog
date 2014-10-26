<article>
	<header>
		<h2><?= $article->Title ?></h2>
		<time datetime='<?= $article->Created ?>'>
			<?= (new DateTime($article->Created))->format('Y-m-d, h:i a') ?>
		</time>
	</header>
	<?= $article->Content ?>
	<footer class="articleSharing icons">
		<a href="<?= makeFacebookShareUrl('/article.php?title=' . $article->ShortName) ?>" class="hasCallout" data-callout="Share on Facebook">
			<span class="fa fa-facebook"></span>
		</a>
		<a href="<?= makeTwitterShareUrl('/article.php?title=' . $article->ShortName, $article->Title) ?>" class="hasCallout" data-callout="Share on Twitter">
			<span class="fa fa-twitter"></span>
		</a>
		<a href="/article.php?title=<?= $article->ShortName ?>" class="hasCallout" data-callout="Permalink">
			<span class="fa fa-link"></span>
		</a>
	</footer>
</article>