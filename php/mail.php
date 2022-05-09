<?php
class Mail{

    public $sujet;
    public $destinataire;
    public $mail;
    public $confirmationMail;
    public $nom;
    public $telephone;
    public $ville;
    public $entete;
    public $message;
    public $maill;

    public function __construct(){
        $this->telephone = $_POST['telephone'];
        $this->ville = $_POST['ville'];
        $this->sujet= $_POST['sujet'];
        $this->destinataire= 'mohamed.bengrich@outlook.fr';
        $this->mail = $_POST['mail'];
        $this->confirmationMail = $_POST['confirmationMail'];
        $this->nom = $_POST['nom'];
        $this->entete  = 'MIME-Version: 1.0' . "\r\n";
        $this->entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $this->entete .= 'From: ' . $mail . "\r\n";
        $this->message = '<p><b>Nom : </b>' . $_POST['nom'] . '<br>
            <b>Telephone : </b>' . $_POST['telephone']  . '<br>
            <b>Ville : </b>' . $_POST['ville']  . '<br>
            <b>Message : </b>' . $_POST['message'] . '</p>';


    }

    public function validateMail(){
        if (isset($this->mail) && isset($this->confirmationMail) && !empty($this->mail) && !empty($this->confirmationMail)) {
        if ($this->mail===$this->confirmationMail) {
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

    public function sendMail(){

        if ($this->validateMail()) {
            $maill= mail($this->destinataire, $this->sujet, $this->message, $this->entete);
        }
    }

}

$mail = new Mail;
$mail->sendMail();


?>