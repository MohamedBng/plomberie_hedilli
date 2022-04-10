<?php 
session_start(); 
require_once '../php/bdd.php';

$login = $_POST['login'];
$pass = $_POST['password'];

$req = $pdo->prepare('SELECT * FROM menbres WHERE login = :login');
$req->execute(array(
	'login' => $login
));
$donnees = $req->fetch();

$passwordVerify = password_verify($pass, $donnees['password']);


if (!$donnees) {
	$_SESSION['donnees'] = "Mauvais login ou mot de passe";
	header("Location:../pageConnexion.php");
} else {
	if ($passwordVerify) {
		$_SESSION['auth'] = $login;
		header('Location: ../admin.php');
	} else {
		$_SESSION['mdp'] ="Mauvais mdp";
		header("Location:../pageConnexion.php");
	}
	
}
