<?php
     require_once('autoload.php');

 include_once("header.php"); ?>
	
	<p class="title actus">Nos actualité</p>
		<div class="underlignText"></div>
    <nav class="actusnav">



	<?php
	$actualites = new Actualité;
     $actualites->afficher();

	?>



	</nav>
	<?php  include_once("footer.php");?>