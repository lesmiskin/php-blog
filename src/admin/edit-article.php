<?php
	ob_start();

	include '../includes/config.php';
	include '../includes/functions.php';

	//GET - Fetch the article.
	if(httpIsGet()) {
		$article = dbAtomicSelectSingle(
			"select Id, Title, ShortName, Content from article where ShortName = :shortName", 
			array(
				':shortName' => getQueryString('title')
		));
	}
	//POST - Delete the article.
	elseif(getPostData('delete') == 'on') {
		dbAtomicNoOutput(
			"delete from article where ShortName = :shortName",
			array(
				':shortName' => getPostData('shortName')
		));
		redirect('/admin');
	}
	//POST - Save the article and redirect to index.
	else{
		dbAtomicNoOutput(
			"update article set Title = :title, ShortName = :shortName, Content = :content, Modified = now() where Id = :id",
			array(
				':title' => 	getPostData('title'),
				':shortName' => getPostData('shortName'),
				':content' => 	getPostData('content'),
				':id' => 		getPostData('id')
		));

		redirect('/admin');
	}
?>

<form method="post">

	<!-- We pass through the Id since we could be modifying the ShortName. -->
	<input type="hidden" name="id" value="<?= $article->Id ?>">
	<input type="text" name="title" placeholder="Title" maxLength="255" required value="<?= $article->Title ?>">
	<input type="text" name="shortName" placeholder="Short name" maxLength="255" required value="<?= $article->ShortName ?>">
	<textarea name="content" rows="15" placeholder="Content" maxLength="21844" required autofocus><?= $article->Content ?></textarea>

	<p><label><input type="checkbox" name="delete">Delete article</label></p>

	<input type="submit" value="Save">

</form>

<?php
	$pageContent = ob_get_contents();
	ob_end_clean();
	$pageTitle = 'Edit article';
	include '_master.php';
?>