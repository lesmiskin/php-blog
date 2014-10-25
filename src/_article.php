<article>
	<header>
		<h2><?= $article->Title ?></h2>
		<time datetime='<?= $article->Created ?>'>
			<?= (new DateTime($article->Created))->format('Y-m-d, h:i a') ?>
		</time>
	</header>
	<?= $article->Content ?>
</article>
