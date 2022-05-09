<?php
     require_once('autoload.php');
     
     

 include_once("header.php"); ?>
	<div id="acceuil">
		<h1 data-aos="fade-left">Plomberie <span>Hedhili</span></h1>
		<h2 data-aos="fade-right">Plomberie, assainissement recherche de fuites et autres travaux dans les Alpes-Maritimes</h2>
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar cursus diam sed interdum. Aliquam ultrices pellentesque neque, non convallis quam convallis in. Etiam lacinia porta nisi, et gravida quam placerat eu. In vel diam nec tortor dictum interdum. Mauris sagittis turpis purus, sed aliquam lorem auctor vitae. Maecenas dictum tristique egestas.</p>
	</div>
	<p class="title">Ce que nous faisons</p>
		<div class="underlignText"></div>
	<nav>
		<div data-aos-delay="300"  data-aos="zoom-in" class="cardBootstrap">
			<div class="card text-center" style="width:100%;">
			  <img src="image/plumber-assembling-pipe.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h2 class="card-title">Plomberie</h2>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="plomberie.php" class="btn btn-primary" style="background-color: #0F4C75; border-color: #0F4C75; ">En savoir plus</a>
			  </div>
			 </div>
		</div>
		<div data-aos="zoom-in" class="cardBootstrap">
			<div class="card text-center" style="width:100%;">
			  <img src="image/service-man-adjusting-house-heating-system.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h2 class="card-title">Plomberie</h2>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="plomberie.php" class="btn btn-primary" style="background-color: #0F4C75; border-color: #0F4C75; ">En savoir plus</a>
			  </div>
			 </div>
		</div>
		<div data-aos-delay="300"  data-aos="zoom-in" class="cardBootstrap">
			<div class="card text-center" style="width:100%;">
			  <img src="image/service-man-instelling-house-heating-system-floor.jpg" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h2 class="card-title">Plomberie</h2>
			    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
			    <a href="plomberie.php" class="btn btn-primary" style="background-color: #0F4C75; border-color: #0F4C75; ">En savoir plus</a>
			  </div>
			</div>
		</div>
	</nav>
	<div id="bgNosAtout">
		<div id="nosAtout">
			<p class="title">Nos atous</p>
			<div class="underlignText"></div>
			<ul>
				<li>Un devis détaillé et gratuit</li>
				<li>Une intervention rapide pour le dépannage</li>
				<li>Un respect des délais convenus</li>
				<li>Des installations fiables et durables</li>
			</ul>
		</div>
	</div>
	<div id="nosRealisations">
		<p class="title">Nos réalisations</p>
		<div class="underlignText"></div>
		<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="image/photo3.jpeg" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="image/photo4.jpeg" class="d-block w-100" alt="...">
			    </div>
			    <div class="carousel-item">
			      <img src="image/photo5.jpeg" class="d-block w-100" alt="...">
			    </div>
			  </div>
			  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
			    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Previous</span>
			  </button>
			  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
			    <span class="carousel-control-next-icon" aria-hidden="true"></span>
			    <span class="visually-hidden">Next</span>
			  </button>
		</div>
	</div>
	<div class="bouton">
		<button onclick="window.location.href = 'realisation.php';">Voir plus</button>
	</div>
	<p class="title actus">Nos récentes actualité</p>
		<div class="underlignText"></div>
    <nav class="actusnav">


   
	<?php
     require_once('autoload.php');
     $actualitesCinq= new Actualité;
     $actualitesCinq->afficherCinq();
	?>
    <div class="bouton">
		<button onclick="window.location.href = 'actualité.php';">Voir toute nos actualité</button>
	</div>


	</nav>
	<div id="zonedintervention">
		<p class="title">Zone d'intervention</p>
		<div class="underlignText"></div>
		<p class="texteIntervention">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar cursus diam sed interdum. Aliquam ultrices pellentesque neque, non convallis quam convallis in. Etiam lacinia porta nisi, et gravida quam placerat eu. In vel diam nectortor dictum interdum.</p>
		<iframe width="100%" height="300px" frameborder="0" allowfullscreen src="//umap.openstreetmap.fr/fr/map/carte-sans-nom_711190?scaleControl=false&miniMap=false&scrollWheelZoom=false&zoomControl=true&allowEdit=false&moreControl=true&searchControl=null&tilelayersControl=null&embedControl=null&datalayersControl=true&onLoadPanel=undefined&captionBar=false"></iframe>
		
	</div>
	<?php  include_once("footer.php");?>
