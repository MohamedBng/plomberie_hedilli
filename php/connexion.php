<?php 
session_start(); 
require_once('autoload.php');

class Connexion{
 public $password;
 public $login;
 public $pass;
 public $bdd;
 public $req;
 public $donnees;
 public $passwordVerify;

 

 public function __construct(){
   $this->login = $_POST['login'];
   $this->password = $_POST['password'];
   $this->bdd = new Bdd;

 }
 
 public function verif(){
    $req = $this->bdd->getPdo()->prepare('SELECT * FROM menbres WHERE login = :login');
	$req->execute(array(
		'login' => $this->login
	));
	$donnees = $req->fetch();

	$passwordVerify = password_verify($this->password, $donnees['password']);


	if (!$donnees) {
		$_SESSION['donnees'] = "Mauvais login ou mot de passe";
		header("Location:../pageConnexion.php");
	}

	else{


		if ($passwordVerify) {
			$_SESSION['auth'] = $this->login;
			header('Location: ../admin.php');
	    } 

	    else {
			$_SESSION['mdp'] ="Mauvais mdp";
			header("Location:../pageConnexion.php");
		}
		
	}
 }
}

$connexion = new Connexion;
$connexion->verif();

