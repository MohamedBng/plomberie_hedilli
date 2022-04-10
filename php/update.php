<?php 
session_start(); 
//Tester une variable de session
    if(!isset($_SESSION['auth'])){
        //Message d'erreur
        $msg = "Login ou mot de passe incorrect.";
        
        //Redirection
        header('Location: connexion.html');
        exit;
    }
require_once '../php/bdd.php';

// je vérifie que le bouton submit ai etait cliqué
if(isset($_POST['insert'])){

// récupérer les valeurs
  $title = $_POST['title'];
  $content = $_POST['content'];
  $category = $_POST['category'];
  $resume = $_POST['resume'];
  $id = $_POST['id'];
  

// vérifie qun fichier ai bien etait sélectionner
  if(isset($_FILES['file'])){

// vérifie que les champs ne sont pas vide
   if(!empty($title) and !empty($content) and !empty($category) and !empty($resume)){

// récupérer les valeurs du fichier
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

// mettre l'extension du fichier en minuscule
    $tabExtension = explode('.', $name);
    $extension = strtolower(end($tabExtension));

//Tableau des extensions que l'on accepte
    $extensions = ['jpg', 'png', 'jpeg', 'gif'];

//Taille max que l'on accepte
    $maxSize = 800000;

// vérifie si l'extension est valide je verifie la taille du fichier etsi il n'y a pas d'erreur
    if(in_array($extension, $extensions)&& $size <= $maxSize && $error == 0){

// Creer un nom de fichier unique
        $uniqueName = uniqid('', true);
    
        $file = $uniqueName.".".$extension;

// upload le fichier sur mon dossier
        move_uploaded_file($tmpName, './images/'.$file);
    


 
 echo($id);
 echo($title);
 echo($content);
 echo($resume);
 echo($category);
 echo($file);

  // Requête mysql pour modifier des données
  $sql = "UPDATE article SET title = :title, content = :content, resume = :resume, category = :category, image = :image WHERE id= :id ";
  $res = $pdo->prepare($sql);
  $exec = $res->execute(array(
    'id' => $id,
    'title' => $title, 
    'content' => $content, 
    'resume' => $resume, 
    'category' => $category, 
    'image' => $file));

  
  // vérifier si la requête  a réussi
  if($exec){
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
 ?>