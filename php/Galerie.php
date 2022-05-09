<?php
require_once('autoload.php');
class Galerie extends Actualité{

 public function uploadImg()
 {
	// vérifie qun fichier ai bien etait sélectionner
	  if(isset($_FILES['files'])){

	// récupérer les valeurs du fichier
	    $this->tmpName = $_FILES['files']['tmp_name'];
	    $this->name = $_FILES['files']['name'];
	    $this->size = $_FILES['files']['size'];
	    $this->error = $_FILES['files']['error'];

	// mettre l'extension du fichier en minuscule
	    $this->tabExtension = explode('.', $this->name);
	    $this->extension = strtolower(end($this->tabExtension));

	//Tableau des extensions que l'on accepte
	    $this->extensions = ['jpg', 'png', 'jpeg', 'gif'];

	//Taille max que l'on accepte
	    $this->maxSize = 1000000;

	// vérifie si l'extension est valide je verifie la taille du fichier etsi il n'y a pas d'erreur
	    if(in_array($this->extension, $this->extensions)&& $this->size <= $this->maxSize && $this->error == 0){

	// Creer un nom de fichier unique
	        $this->uniqueName = uniqid('', true);
	    
	        $this->file = $this->uniqueName.".".$this->extension;

	// upload le fichier sur mon dossier
	        move_uploaded_file($this->tmpName, '../images/'.$this->file);

	 // Requête mysql pour insérer des données
	  $this->sql = "INSERT INTO galerie (image) VALUES (?)";
	  $this->res = $this->bdd->getPdo()->prepare($this->sql);
	  $this->exec = $this->res->execute(array($this->file));

	 // Redirection vers la page d'administration
	  header('Location: ../admin.php');
	}
	 else{
	 	    echo ($this->extension);
	        echo "Mauvaise extension";
	    }
	}
	else{
	 	    
	        echo "pas de file";
	    }
	if($this->exec){
	    echo 'Données insérées';
	    header('Location: ../admin.php');
	  }else{
	    echo "Échec de l'opération d'insertion";
	  }
   }


   public function deleteImg(){
	     // récupérer les valeurs 
	  $this->id = $_GET["id"];
	  echo($this->id);

	  // requete sql pour supprimer 
	  $this->req = $this->bdd->getPdo()->query('DELETE FROM galerie WHERE id='.$this->id.'');

	  // Redirection vers la page d'administration
	  header('Location: ../admin.php');

   }

   public function showGalerie(){
   	// sélectionner tout les billet 
		$this->req = $this->bdd->getPdo()->query('SELECT id, image FROM galerie ORDER BY createdAt DESC');
		while ($this->donnees = $this->req->fetch())

		{

		?>


		      <div class="imgGalerieAdmin">
		     <img src="images/<?php echo htmlspecialchars($this->donnees['image']); ?>"style="width:100px;height: 100px;" alt="...">
		      <a href="../projet_stage/php/Galerie.php?deleteImg='deleteImg'&id='<?php echo htmlspecialchars($this->donnees['id']);?>'"class="btn btn-warning">Supprimer l'image</a>
		      </div>
		     
		<?php

		} // Fin de la boucle des billets

		$this->req->closeCursor();
   }
}





if(isset($_POST['uploadImage'])){
  $uploadImg = new Galerie;
  $uploadImg->uploadImg();
	}
if(isset($_GET['id']) and isset($_GET['deleteImg'])){
$deleteImg = new Galerie;
$deleteImg->deleteImg();
}

?>