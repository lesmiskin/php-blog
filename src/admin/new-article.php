<?php
	ob_start();

	include '../includes/config.php';
	include '../includes/functions.php';

	//POST - Save the article and redirect.
	if(httpIsPost()) {
		dbAtomicNoOutput(
			"insert into article (Title, ShortName, Content, Created, Modified) values(:title, :shortName, :content, now(), now())",
			array(
				':title' => 	getPostData('title'),
				':shortName' => getPostData('shortName'),
				':content' => 	getPostData('content')
		));

		redirect('/admin');
	}
?>

<form method="post">

	<input type="text" name="title" placeholder="Title" maxLength="255" required autofocus>
	<input type="text" name="shortName" placeholder="Short name" maxLength="255" required>
	<textarea name="content" rows="15" placeholder="Content" maxLength="21844" required>
	</textarea>

	<input type="submit" value="Save">

</form>

<?php
	$pageContent = ob_get_contents();
	ob_end_clean();
	$pageTitle = 'New article';
	include '_master.php';
?>