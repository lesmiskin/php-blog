<?php
	ob_start();

	//Load in configuration variables from external file.
	include 'includes/config.php';

	//Connect to database and grab articles.
	$connection = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
	$selectQuery = "select Title, Content, Created from article order by created desc";
	
	//Load results into array for iteration later on in the page.
	$results = $connection	
		->query($selectQuery)
		->fetchAll(PDO::FETCH_OBJ);
	
	//We can now safely terminate the DB connection.
	$connection = null;

	//Include 'About' sidebar.
	include 'about.php';
?>

<!-- Main blog article iteration -->
<?php foreach($results as $row) { ?>
	<article>
		<header>
			<h2><?= $row->Title ?></h2>
			<time datetime='<?= $row->Created ?>'>
				<?= (new DateTime($row->Created))->format('Y-m-d, h:i a') ?>
			</time>
		</header>
		<?= $row->Content ?>
	</article>
<?php } ?>

<!-- Twitter widget (if enabled) -->
<?php if(TWITTER_WIDGET_ENABLED) { ?>
	<article>
		<a class="twitter-timeline" href="//twitter.com/<?= TWITTER_HANDLE ?>" data-chrome="noborders noheader nofooter" data-widget-id="<?= TWITTER_WIDGET_ID ?>"></a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
	</article>
<?php } ?>

<?php
  $pageContent = ob_get_contents();
  ob_end_clean();
  $pageTitle = BLOG_TITLE;
  include '_master.php';
?>
