<?php
     require_once '../projet_stage/php/bdd.php';

 include_once("header.php"); ?>
	
	<p class="title actus">Nos actualité</p>
		<div class="underlignText"></div>
    <nav class="actusnav">



	<?php

	// On récupère les 5 derniers billets

	$req = $pdo->query('SELECT id, title, content, image, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM article ORDER BY createdAt DESC');
	while ($donnees = $req->fetch())

	{

	?>
	


		<div data-aos-delay="300"  data-aos="zoom-in" class="cardBootstrapTwo">
			<div class="card text-center" style="width:100%; margin-top: 10%; margin-bottom: 10%;">
			  <img src="images/<?php echo htmlspecialchars($donnees['image']); ?>" style="width:100%;height: 400px;" class="card-img-top" alt="...">
			  <div  class="card-body">
			    <h2 class="card-title"style="height: 100px; overflow: hidden;text-overflow: ellipsis; "><?php echo htmlspecialchars($donnees['title']); ?></h2>
			    <p class="card-text" style="height: 70px; overflow: hidden;text-overflow: ellipsis; "><?php

    // On affiche le résumer du billet

    echo nl2br(htmlspecialchars($donnees['content']));

    ?></p></p>
                <p>Créé le : <?php echo $donnees['date_creation_fr']; ?></p>
			    <a href="single.php?id='<?php echo htmlspecialchars($donnees['id']);?>'" class="btn btn-primary" style="background-color: #0F4C75; border-color: #0F4C75; ">En savoir plus</a>
			  </div>
			 </div>
		</div>

	<?php

	} // Fin de la boucle des billets

	$req->closeCursor();

	?>



	</nav>
	<?php  include_once("footer.php");?>