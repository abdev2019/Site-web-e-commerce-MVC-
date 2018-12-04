<?php

class ContactC
{
    public function __construct(){ $this->load(); }
    public function load()
    {
        if(isset($_POST['envoyer']))
        {  
            require_once(dos.'mvc/c/validation.class.php');
            $test = Validation::validerInfosUtilisateur($_POST['nom'],$_POST['prenom'],25,$_POST['email']);
            
            if( strlen($test)==0 )
            {
                require_once(dos.'mvc/c/mail.php');
                $body = "Nouveau contact de :<br>".$_POST['nom']." ".$_POST['prenom']."<br>E-mail : ".$_POST['email']."<br>".$_POST['des']."<br>" ;
                confirmer( 'sopsi.agadir2020@gmail.com','SOPSI','',$body );
            }
        } 
        require_once(dos."mvc/v/contact.php"); 
    } 
}

?>