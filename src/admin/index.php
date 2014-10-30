<?php
	ob_start();

	include '../includes/config.php';
	include '../includes/functions.php';

	$articles = dbAtomicSelect(
		"select Title, ShortName, Created from article order by Created desc"
	);
?>

<table>

<form action="new-article.php">
	<input type='submit' value='New article'>
</form>

<?php
	foreach($articles as $article) {
?>
	<tr>
		<td class="title">
			<a href="edit-article.php?title=<?= $article->ShortName ?>">
				<?= $article->Title ?>
			</a>
		</td>
		<td class="created"><?= formatDate($article->Created) ?></td>
	</tr>
<?php 
	} 
?>
</table>

<?php
	$pageContent = ob_get_contents();
	ob_end_clean();
	$pageTitle = 'Manage articles';
	include '_master.php';
?>