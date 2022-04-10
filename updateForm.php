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
$id= $_GET['id'];
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
<p class="title">Modifier un billet</p>
        <div class="underlignText"></div>
<div class="updateForm" >
<form enctype="multipart/form-data" action="../projet_stage/php/update.php" method="post" >
    <input type="hidden" name="id" value= <?php echo $id;?>>
    <input required type="text" name="title" placeholder= "Titre">
    <input required type="text" name="category" placeholder= "Categorie">
    <input required type="text" name="resume" placeholder= "Resumé">
    <input required type="file" name="file" placeholder= "Image">
    <textarea required name="content">Content</textarea>
    <input name="insert" type="submit" value="Insérer">
</form>
</div>
</body>
</html>