<?php 
require_once('autoload.php');


$login = $_POST['login'];
$password = $_POST['password'];


class Login
{
 public $password;
 public $mail;
 public $confirmmail;
 public $login;
 public $pass;
 public $bdd;
 public $req;

 

 public function __construct(){
   $this->mail = $_POST['mail'];
   $this->confirmmail = $_POST['confirmmail'];
   $this->login = $_POST['login'];
   $this->password = $_POST['password'];
   $this->bdd = new Bdd;

 }


    public function validationMail(){

            if (isset($this->mail) && isset($this->confirmmail) && !empty($this->mail) && !empty($this->confirmmail)) {


                if ($this->mail===$this->confirmmail) {


                        if(filter_var($this->mail, FILTER_VALIDATE_EMAIL)){
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


    public function validation(){

          if(5 == preg_match("#[A-Z]#", $this->password) + preg_match("#[a-z]#", $this->password) + preg_match("#[0-9]#", $this->password) + preg_match("#[^a-zA-Z0-9]#", $this->password)+ preg_match("#.{8,}#", $this->password)){
            return true;
          }
        } 
    

    public function insert(){

        $pass = password_hash($this->password, PASSWORD_DEFAULT);


        if (isset($this->login) && isset($this->password) && !empty($this->login) && !empty($this->password)) {

               if ($this->validation()){


                    if($this->validationMail()){
                    
                        $req= $this->bdd->getPdo()->prepare('INSERT INTO menbres(login, password, mail) VALUES(:login, :password, :mail )');
                        $req->execute(array(
                            'login' => $this->login,
                            'password' => $pass,
                            'mail' => $this->mail
                        ));
                        header("Location:../pageConnexion.php");
                    } 
                 
                 }


                else{
                    echo "Le mot de passe doit contenir au moin 8 caractères une minuscule une majuscule un chiffre et un carctère spécial";
                 }  
            }

            else{
                echo "Tous les champs ne sont pas completé";
            }  
    }

}

    $inscription = new Login;
    $inscription->insert();
   
    



 ?>