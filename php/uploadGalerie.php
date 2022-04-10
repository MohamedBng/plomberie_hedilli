<?php 
require_once '../php/bdd.php';
// je vérifie que le bouton submit ai etait cliqué
  if(isset($_POST['uploadImage'])){

// vérifie qun fichier ai bien etait sélectionner
  if(isset($_FILES['files'])){

// récupérer les valeurs du fichier
    $tmpName = $_FILES['files']['tmp_name'];
    $name = $_FILES['files']['name'];
    $size = $_FILES['files']['size'];
    $error = $_FILES['files']['error'];

// mettre l'extension du fichier en minuscule
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

//Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];

//Taille max que l'on accepte
    $maxSize = 1000000;

// vérifie si l'extension est valide je verifie la taille du fichier etsi il n'y a pas d'erreur
    if(in_array($extension, $extensions)&& $size <= $maxSize && $error == 0){

// Creer un nom de fichier unique
        $uniqueName = uniqid('', true);
    
        $file = $uniqueName.".".$extension;

// upload le fichier sur mon dossier
        move_uploaded_file($tmpName, './images/'.$file);

 // Requête mysql pour insérer des données
  $sql = "INSERT INTO galerie (image) VALUES (?)";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array($file));

 // Redirection vers la page d'administration
  header('Location: ../admin.php');
}
 else{
 	    echo ($extension);
        echo "Mauvaise extension";
    }
}
else{
 	    
        echo "pas de file";
    }
if($exec){
    echo 'Données insérées';
    header('Location: ../admin.php');
  }else{
    echo "Échec de l'opération d'insertion";
  }

}
else{
    echo "Échec n";
  }

