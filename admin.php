<?php
session_start(); 
//Tester une variable de session
    if(!isset($_SESSION['auth'])){
        //Message d'erreur
        $msg = "Login ou mot de passe incorrect.";
        
        //Redirection
        header('Location: pageConnexion.php');
        exit;
    }
require_once '../projet_stage/php/bdd.php';

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/hedilli.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
</head>
<body>
<p class="title">Mes actualité</p>
        <div class="underlignText"></div>
<div class="formulaireActuAdminEtActuAdmin">
<div class="actuAdmin">
    <p class="title">Gérer mes actualité</p>
        <div class="underlignText"></div>
<?php
// sélectionner tout les billet 
$req = $pdo->query('SELECT id, title, DATE_FORMAT(createdAt, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM article ORDER BY createdAt DESC');
while ($donnees = $req->fetch())

{

?>
  
 
          <h5 class="card-title"><?php echo htmlspecialchars($donnees['title']); ?></h5>
          <p>Créé le : <?php echo $donnees['date_creation_fr']; ?></p>
          <div class="btnActuAdmin">
          <a style="padding-right: 40%;" href="../projet_stage/php/delete.php?id='<?php echo htmlspecialchars($donnees['id']);?>'"class="btn btn-warning">Supprimer l'article</a>
          <a href="updateForm.php?id='<?php echo htmlspecialchars($donnees['id']);?>'"class="btn btn-warning">Update</a>
          </div>
  <?php

} // Fin de la boucle des billets

$req->closeCursor();


?>
</div>
<div class="formulaireActuAdmin">
    <p class="title">Créer un billet</p>
        <div class="underlignText"></div>
<form enctype="multipart/form-data" action="../projet_stage/php/uploadArticle.php" method="post" >

    <input type="text" name="title" placeholder= "Titre" required>
    <input type="text" name="category" placeholder= "Categorie" required>
    <input type="text" name="resume" placeholder= "Resumé" required>
    <input type="file" name="file" placeholder= "Image" required>
    <input name="about" type="hidden">
    <textarea required name="content">Content</textarea>
    <input name="insert" type="submit" value="Insérer">
</form>
<script>
                CKEDITOR.replace( 'content' );
            </script>
</div>
</div>

<p class="title">Gérer ma galerie photo</p>
        <div class="underlignText"></div>
<div class="allImgGalerieAdmin">
 <?php
// sélectionner tout les billet 
$req = $pdo->query('SELECT id, image FROM galerie ORDER BY createdAt DESC');
while ($donnees = $req->fetch())

{

?>
  
 
          <div class="imgGalerieAdmin">
         <img src="images/<?php echo htmlspecialchars($donnees['image']); ?>"style="width:100px;height: 100px;" alt="...">
          <a href="../projet_stage/php/deleteGalerie.php?id='<?php echo htmlspecialchars($donnees['id']);?>'"class="btn btn-warning">Supprimer l'image</a>
          </div>
         
  <?php

} // Fin de la boucle des billets

$req->closeCursor();

?>
</div>

<div class="formGalerieAdmin">
<p class="title">Insérer une image</p>
        <div class="underlignText"></div>
<form enctype="multipart/form-data" action="../projet_stage/php/uploadGalerie.php" method="post" >
    <input required type="file" name="files">
    <input required name="uploadImage" type="submit" value="Insérer">
</form>
</div>
</body>
</html>