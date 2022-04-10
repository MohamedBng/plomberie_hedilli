<?php 
require_once '../php/bdd.php';

$login = $_POST['login'];
$password = $_POST['password'];
$mail = $_POST['mail'];
$confirmmail = $_POST['confirmmail'];

function validationMail($mail, $confirmmail){
    if (isset($mail) && isset($confirmmail) && !empty($mail) && !empty($confirmmail)) {
        if ($mail===$confirmmail) {
            if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
                return true;
            }
         else{
    echo"Le mail doit etre valide";
    return false;
    } 
    }
     else{
    echo"Le mail et sa confirmation doivent etre identiques e";
    return false;
    } 
    }
    else {
    echo"Le mail doit etre renseigner";
        return false;
    }
    
}
function validation($password)
{
  if(5 == preg_match("#[A-Z]#", $password) + preg_match("#[a-z]#", $password) + preg_match("#[0-9]#", $password) + preg_match("#[^a-zA-Z0-9]#", $password)+ preg_match("#.{8,}#", $password)){
  	return true;
  }
}
	$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);


if (isset($login) && isset($password) && !empty($login) && !empty($password)) {
   if (validation($password)) {
    if(validationMail($mail, $confirmmail)){
    
      	

    $req= $pdo->prepare('INSERT INTO menbres(login, password, mail) VALUES(:login, :password, :mail )');
$req->execute(array(
    'login' => $login,
    'password' => $pass,
    'mail' => $mail
));
header("Location:pageConnexion.php");
 } 
 
 }
 else{
    echo "Le mot de passe doit contenir au moin 8 caractères une minuscule une majuscule un chiffre et un carctère spécial";
 }  
}
else{
    echo "Tous les champs ne sont pas completé";
 }  
   
	


 ?>