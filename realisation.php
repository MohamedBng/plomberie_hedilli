 <?php
  require_once '../projet_stage/php/bdd.php';
  include_once("header.php"); ?>


 <div data-aos="zoom-in" id="pageRealisationTxt">
 <h1>Nos <span>Réalisations</span></h1>
 <h2>Plomberie, assainissement recherche de fuites et autres travaux dans les Alpes-Maritimes</h2>
 <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse pulvinar cursus diam sed interdum. Aliquam ultrices pellentesque neque, non convallis quam convallis in. Etiam lacinia porta nisi, et gravida quam placerat eu. In vel diam nec tortor dictum interdum.</p>
 </div>
 <p class="title">Gallerie</p>
 <div class="underlignTextRea"></div>
 <div id="bgGrandeImageRealisation">
 	 <i id="closeBtn" class="fas fa-times"></i>
	 <div id="grandeImageRealisation">
		 <div id="imageRealisation">
			 <img id="grandeimg" src="image/DBF18DF4-0030-4B85-A902-1ACA6EC1CD3A.jpeg" alt="...">
		 </div>
     </div>
 </div>
 <div id="containerPageRealisation">
	 <div id="pageRealisation" class="pageRealisationJs">
	 	<?php

	// On récupère les 5 derniers billets

	$req = $pdo->query('SELECT image FROM galerie ORDER BY createdAt');
	while ($donnees = $req->fetch())

	{

	?>
	 	<div class="containeurImgGallerie">
		 <img src="images/<?php echo htmlspecialchars($donnees['image']); ?>" alt="...">
		</div>

	<?php

	} // Fin de la boucle des billets

	$req->closeCursor();

	?>
	 </div>
 </div>

 
	<script src="js/hedilli.js" type="text/javascript"></script>
  <?php  include_once("footer.php");?>