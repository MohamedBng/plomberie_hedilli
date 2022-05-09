<?php session_start(); 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<title>connexion</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="login.css">
	<script  src="connexion.js"></script>
</head>
<body>

	<?php 
 if(isset($_SESSION['mdp'])){
        //Message d'erreur
 	$msg = $_SESSION['mdp']; 
 	session_destroy();
    }
 if(isset($_SESSION['donnees'])){
        //Message d'erreur
 	$msg = $_SESSION['donnees'];
   session_destroy();
    }

?>
 
    <?php if(isset($msg)){ ?>
    <div class="errorLogin">
    	<p> <?php  echo $msg ?> </p>
    </div>
   <?php } ?>
	<div id="formulaire">
		<form onsubmit="return verifChamp();" action="../projet_stage/php/connexion.php" method="post">
			<input required id="login" placeholder="login" type="texte" name="login">
			<input required id="password"  placeholder="password" type="password" name="password">
			<button type="submit">Submit</button>
		</form>

	</div>
</body>
</html>