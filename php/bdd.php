<?php 
$host = 'localhost';
$dbname = 'blog';
$username = 'root';
$password = '';
try {
  // se connecter à mysql
  $pdo = new PDO("mysql:host=$host;dbname=$dbname","$username","$password");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }
?>