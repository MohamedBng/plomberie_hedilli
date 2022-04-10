<?php
     require_once '../projet_stage/php/bdd.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="hedilli.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<?php
// vérifie si l'id de l'article a bien etait envoyer dans l'url
if (isset ($_GET["id"])) {
$id = $_GET["id"];
// afficher le billet en fonction de son id
$req = $pdo->query('SELECT id, title, content, image, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM article WHERE id='.$id.'');
while ($donnees = $req->fetch())

{
	?>
	
	<div class="actuRecent">
	    <div class="card" style="width: 60%; margin:0 auto; ">
		      <img src="images/<?php echo htmlspecialchars($donnees['image']); ?>" class="card-img-top" alt="...">
			  <div class="card-body">
			    <h5 class="card-title"><?php echo htmlspecialchars($donnees['title']); ?></h5>
			    
			    <p class="card-text"><?php

    // On affiche le contenu du billet

    echo nl2br($donnees['content']);

    ?></p>
			    <p>Créé le : <?php echo $donnees['date_creation_fr']; ?></p>
			    
			  </div>
		</div>
	</div>
	<?php

} // Fin de la boucle des billets

$req->closeCursor();


} else {
	 echo "Échec de l'opération";
} 
?>
</body>
</html>