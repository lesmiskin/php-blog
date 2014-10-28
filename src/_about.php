<!-- Styles that depend on PHP variables go here. -->
<style>
	#profilePicture {
		background-image: url('/themes/<?= BLOG_THEME ?>/images/profile.png');
	}

	/*Retina images*/
	@media 
	only screen and (-webkit-min-device-pixel-ratio: 2), 
	only screen and (min-resolution: 192dpi) { 
		#profilePicture {
			background-image: url('/themes/<?= BLOG_THEME ?>/images/profile@2x.png');
			background-size:180px 180px;
		}
	}
</style>

<!-- 'About' sidebar. -->
<section id="about">
	<h2>
		<?= BLOG_ABOUT_TITLE ?>
	</h2>
	<div id="profilePicture"></div>
	<?= BLOG_ABOUT_PROFILE ?>
</section>
