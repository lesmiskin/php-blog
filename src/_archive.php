<section id="archive">
	<ul>
		<?php foreach($results as $article) { ?>
			<li>
				<a href="/article.php?title=<?= $article->ShortName ?>"><?= $article->Title ?></a>
			</li>
		<?php } ?>
	</ul>
</section>
