<?php
require_once('autoload.php');

class Actualité{

    public $bdd;
    public $title;
    public $content;
    public $category;
    public $resume;
    public $tmpName;
    public $name;
    public $size;
    public $error;
    public $tabExtension;
    public $extension;
    public $extensions;
    public $maxSize;
    public $uniqueName;
    public $file;
    public $sql;
    public $res;
    public $exec;
    public $req;
    public $donnees;
    public $id;
	public function __construct(){
    $this->bdd = new Bdd;
      
	}
    
	public function afficherCinq(){
		$this->req = $this->bdd->getPdo()->query('SELECT id, title, content, image, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM article ORDER BY createdAt DESC LIMIT 0, 2');
	while ($this->donnees = $this->req->fetch())

	{

	?>
	<div data-aos-delay="300"  data-aos="zoom-in" class="cardBootstrapTwo">
	    <div class="card text-center" style="width:100%; margin-top: 10%; margin-bottom: 10%;">
			  <img src="images/<?php echo htmlspecialchars($this->donnees['image']); ?>" class="card-img-top"
			  style="width:100%;height: 400px;" alt="...">
			  <div  class="card-body">
			    <h2 class="card-title" style="height: 100px; overflow: hidden;text-overflow: ellipsis; "><?php echo htmlspecialchars($this->donnees['title']); ?></h2>
			    <p class="card-text" style="height: 70px; overflow: hidden;text-overflow: ellipsis; "><?php

    // On affiche le résumer du billet

    echo nl2br($this->donnees['content']);

    ?></p></p>
                <p>Créé le : <?php echo $this->donnees['date_creation_fr']; ?></p>
			    <a href="single.php?id='<?php echo htmlspecialchars($this->donnees['id']);?>'" class="btn btn-primary" style="background-color: #0F4C75; border-color: #0F4C75; ">En savoir plus</a>
			  </div>
		 </div>
	</div>

	<?php

	} // Fin de la boucle des billets

	$this->req->closeCursor();

	

	}

    public function image(){
    	?><img src="images/61ddb1788807a3.50986479.jpg"><?php 
    }



	public function afficherSinglePage(){
		// vérifie si l'id de l'article a bien etait envoyer dans l'url
			if (isset ($_GET["id"])) {
			$this->id = $_GET["id"];
			// afficher le billet en fonction de son id
			$this->req = $this->bdd->getPdo()->query('SELECT id, title, content, image, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM article WHERE id='.$this->id.'');
			while ($this->donnees = $this->req->fetch())

			{
				?>
				
				<div class="actuRecent">
				    <div class="card" style="width: 60%; margin:0 auto; ">
					      <img src="images/<?php echo htmlspecialchars($this->donnees['image']); ?>" class="card-img-top" alt="...">
						  <div class="card-body">
						    <h5 class="card-title"><?php echo htmlspecialchars($this->donnees['title']); ?></h5>
						    
						    <p class="card-text"><?php

			    // On affiche le contenu du billet

			    echo nl2br($this->donnees['content']);

			    ?></p>
						    <p>Créé le : <?php echo $this->donnees['date_creation_fr']; ?></p>
						    
						  </div>
					</div>
				</div>
				<?php

			} // Fin de la boucle des billets

			$this->req->closeCursor();


			}

	

	}






	public function afficher(){

		$this->req = $this->bdd->getPdo()->query('SELECT id, title, content, image, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM article ORDER BY createdAt DESC');
	while ($this->donnees = $this->req->fetch())

	{

	?>
	


		<div data-aos-delay="300"  data-aos="zoom-in" class="cardBootstrapTwo">
			<div class="card text-center" style="width:100%; margin-top: 10%; margin-bottom: 10%;">
			  <img src="images/<?php echo htmlspecialchars($this->donnees['image']); ?>" style="width:100%;height: 400px;" class="card-img-top" alt="...">
			  <div  class="card-body">
			    <h2 class="card-title"style="height: 100px; overflow: hidden;text-overflow: ellipsis; "><?php echo htmlspecialchars($this->donnees['title']); ?></h2>
			    <p class="card-text" style="height: 70px; overflow: hidden;text-overflow: ellipsis; "><?php

    // On affiche le résumer du billet

    echo nl2br(htmlspecialchars($this->donnees['content']));

    ?></p></p>
                <p>Créé le : <?php echo $this->donnees['date_creation_fr']; ?></p>
			    <a href="single.php?id='<?php echo htmlspecialchars($this->donnees['id']);?>'" class="btn btn-primary" style="background-color: #0F4C75; border-color: #0F4C75; ">En savoir plus</a>
			  </div>
			 </div>
		</div>

	<?php

	} // Fin de la boucle des billets

	$this->req->closeCursor();


	}








	public function afficherAdmin(){

		$this->req = $this->bdd->getPdo()->query('SELECT id, title, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM article ORDER BY createdAt DESC');
	while ($this->donnees = $this->req->fetch())

	{

	?>
	


		<h5 class="card-title"><?php echo htmlspecialchars($this->donnees['title']); ?></h5>
          <p>Créé le : <?php echo $this->donnees['date_creation_fr']; ?></p>
          <div class="btnActuAdmin">
          <a style="padding-right: 40%;" href="../projet_stage/php/Actualité.php?delete='delete'&id='<?php echo htmlspecialchars($this->donnees['id']);?>'"class="btn btn-warning">Supprimer l'article</a>
          <a href="updateForm.php?id='<?php echo htmlspecialchars($this->donnees['id']);?>'"class="btn btn-warning">Update</a>
          </div>

	<?php

	} // Fin de la boucle des billets

	$this->req->closeCursor();


	}



	public function delete(){

		
		  // récupérer les valeurs 
		  $this->id = $_GET["id"];

		  // requete sql pour supprimer 
		  $this->req = $this->bdd->getPdo()->query('DELETE FROM article WHERE id='.$this->id.'');

		  // Redirection vers la page d'administration
		  header('Location: ../admin.php');
	}

	public function upload(){

        

		// récupérer les valeurs
		  $this->title = $_POST['title'];
		  $this->content = $_POST['content'];
		  $this->category = $_POST['category'];
		  $this->resume = $_POST['resume'];

		// vérifie qun fichier ai bien etait sélectionner
		  if(isset($_FILES['file'])){

		// vérifie que les champs ne sont pas vide
		   if(!empty($this->title) and !empty($this->content) and !empty($this->category) and !empty($this->resume)){

		// récupérer les valeurs du fichier
		    $this->tmpName = $_FILES['file']['tmp_name'];
		    $this->name = $_FILES['file']['name'];
		    $this->size = $_FILES['file']['size'];
		    $this->error = $_FILES['file']['error'];

		// mettre l'extension du fichier en minuscule
		    $this->tabExtension = explode('.', $this->name);
		    $this->extension = strtolower(end($this->tabExtension));

		//Tableau des extensions que l'on accepte
		    $this->extensions = ['jpg', 'png', 'jpeg', 'gif'];

		//Taille max que l'on accepte
		    $this->maxSize = 800000;

		// vérifie si l'extension est valide je verifie la taille du fichier etsi il n'y a pas d'erreur
		    if(in_array($this->extension, $this->extensions)&& $this->size <= $this->maxSize && $this->error == 0){

		// Creer un nom de fichier unique
		        $this->uniqueName = uniqid('', true);
		    
		        $this->file = $this->uniqueName.".".$this->extension;

		// upload le fichier sur mon dossier
		        move_uploaded_file($this->tmpName, '../images/'.$this->file);
		    


		 
		 

		  // Requête mysql pour insérer des données
		  $this->sql = "INSERT INTO article (title, content, resume, category, image) VALUES (?, ?, ?, ?, ?)";
		  $this->res = $this->bdd->getPdo()->prepare($this->sql);
		  $this->exec = $this->res->execute(array($this->title, $this->content, $this->resume, $this->category, $this->file));

		  
		  // vérifier si la requête d'insertion a réussi
		  if($this->exec){
		    echo 'Données insérées';
		    header('Location: ../admin.php');
		  }else{
		    echo "Échec de l'opération d'insertion";
		  }
		  }
		    else{
		        echo "Mauvaise extension";
		    }
		}
		   else{
		        echo "Les champs sont vides";
		    }
		 }
		   else{
		        echo "Vous devez séléctionner une image";
		    }

			}



	public function update(){
    

    
	
// récupérer les valeurs
  $this->title = $_POST['title'];
  $this->content = $_POST['content'];
  $this->category = $_POST['category'];
  $this->resume = $_POST['resume'];
  $this->id = $_POST['id'];
  echo($this->id);
  

// vérifie qun fichier ai bien etait sélectionner
  if(isset($_FILES['file'])){

// vérifie que les champs ne sont pas vide
   if(!empty($this->title) and !empty($this->content) and !empty($this->category) and !empty($this->resume)){

// récupérer les valeurs du fichier
    $this->tmpName = $_FILES['file']['tmp_name'];
    $this->name = $_FILES['file']['name'];
    $this->size = $_FILES['file']['size'];
    $this->error = $_FILES['file']['error'];

// mettre l'extension du fichier en minuscule
    $this->tabExtension = explode('.', $this->name);
    $this->extension = strtolower(end($this->tabExtension));

//Tableau des extensions que l'on accepte
    $this->extensions = ['jpg', 'png', 'jpeg', 'gif'];

//Taille max que l'on accepte
    $this->maxSize = 800000;

// vérifie si l'extension est valide je verifie la taille du fichier etsi il n'y a pas d'erreur
    if(in_array($this->extension, $this->extensions)&& $this->size <= $this->maxSize && $this->error == 0){

// Creer un nom de fichier unique
        $this->uniqueName = uniqid('', true);
    
        $this->file = $this->uniqueName.".".$this->extension;

// upload le fichier sur mon dossier
        move_uploaded_file($this->tmpName, '../images/'.$this->file);
    


 


  // Requête mysql pour modifier des données
  $sql = "UPDATE article SET title = :title, content = :content, resume = :resume, category = :category, image = :image WHERE id= :id ";
  $this->res = $this->bdd->getPdo()->prepare($sql);
  $this->exec = $this->res->execute(array(
    'id' => $this->id,
    'title' => $this->title, 
    'content' => $this->content, 
    'resume' => $this->resume, 
    'category' => $this->category, 
    'image' => $this->file));

  
  // vérifier si la requête  a réussi
  if($this->exec){
    header('Location: ../admin.php');
    
  }else{
    echo "Échec de l'opération d'insertion";
  }
  }
    else{
        echo "Mauvaise extension";
    }
}
   else{
        echo "Les champs sont vides";
    }
 } 
   else{
        echo "Vous devez séléctionner une image";
    }

		}
	
}


if(isset($_GET['id']) and isset($_GET['delete'])){
$actualites = new Actualité;
$actualites->delete();
}
if(isset($_POST['insert'])){
  $actualites = new Actualité;
  $actualites->upload();
	}
if(isset($_POST['update'])){
  $actualites = new Actualité;
  $actualites->update();
  echo "hhhhhh";
	}
else

?>