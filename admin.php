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
require_once('autoload.php');


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
$actuAdmin = new Actualité;
$actuAdmin->afficherAdmin();
?>
</div>
<div class="formulaireActuAdmin">
    <p class="title">Créer un billet</p>
        <div class="underlignText"></div>
<form enctype="multipart/form-data" action="../projet_stage/php/Actualité.php" method="post" >

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
$galerie = new Galerie;
$galerie->showGalerie();

?>
</div>

<div class="formGalerieAdmin">
<p class="title">Insérer une image</p>
        <div class="underlignText"></div>
<form enctype="multipart/form-data" action="../projet_stage/php/Galerie.php" method="post" >
    <input required type="file" name="files">
    <input required name="uploadImage" type="submit" value="Insérer">
</form>
</div>
</body>
</html>