<?php 


class Bdd 
{
  public $pdo;
  public  function __construct()
  {
    try {
  // se connecter à mysql
  $this->pdo = new PDO("mysql:host=localhost;dbname=blog","root","");
  } catch (PDOException $exc) {
    echo $exc->getMessage();
    exit();
  }

  
  }



  public function getPdo(){
   if ($this->pdo) {
     return $this->pdo;
   }
   
 
  }
}

$bdd = new Bdd();

?>