<?php

class ClientC
{
    public $req;
    
    public function __construct($req)
    {
       $this->req = $req;
       $this->load();
    }
    
    public function load() 
    { 
        if($this->req->action == 'deconnexion')  { session_destroy(); header('location: /'); exit(); }
        
        if( isset($_SESSION['id_admin']) )
        {
            if($this->req->action=='suprimer' && isset($_POST['suprimer']) )
            {
                require_once(dos."mvc/m/client.php"); 
                if(isset($_SESSION['id_admin']))
                {
                    ClientM::suprimer($_POST['id']);
                    header('location: /admin/gerer/client/?_sup'); 
                    exit();
                }
            }
            else if( $this->req->action == 'panier' && isset($_POST['afficher_panier']) )
            {
                $panier=null; 
                require_once(dos.'mvc/m/commande.php'); 
                $commande   = CommandeM::get($_POST['id_cmd']); 
                
                if($commande!=null ){
                    require_once(dos.'mvc/m/panier.php');
                    $panier     = PanierM::getPanier($commande->panier);
                }
                
                if($panier!=null)
                    include(dos.'mvc/v/client/panier.php');
                else include(dos.'mvc/v/404.php');
            }
        } 
        
        if( isset($_SESSION['id_client']) )
        switch($this->req->action)
        {
            case 'modifier'         :   require_once(dos.'mvc/m/client.php');
                                        require_once('validation.class.php');
                                            
                                        $test = Validation::validerInfosUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email']);
                                        $test.= Validation::validerInfosClient($_POST['cin'],$_POST['tel'],$_POST['adresse']);
                                            
                                        if(strlen($test)==0){
                                            ClientM::modifier($_SESSION['id_client'],$_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email'],$_POST['cin'],$_POST['adresse'],$_POST['tel']);
                                            echo "<br><div class='alert-success alert'><span class='fa fa-check' style='font-size:20;'></span> Modification Reuissite</div>";
                                        }
                                        else echo $test;
                                        break;
                                
            case 'suprimer'         :   if(isset($_POST['suprimer']))
                                        {
                                            require_once(dos."mvc/m/client.php");  
                                            $client = ClientM::get($_SESSION['id_client']);
                                            if( $_POST['code_client'] == $client->code )
                                            {
                                                ClientM::suprimer($_SESSION['id_client']);
                                                header('location: /client/deconnexion/?sup=1');
                                            }
                                            else
                                            {
                                                $non=1;
                                                include(dos.'mvc/v/client/client.php');
                                            } 
                                        }
                                        break; 
                                        
            case 'demande_reparation' : require_once(dos."mvc/m/categorie.php"); 
                                        if(isset($_POST['demande_reaparation']))
                                        {
                                            $test="";
                                            if( strlen($_POST['des'])<20 ) $test="<div  class='alert alert-danger'>* La description doit etre au moins 20c. !</div>";
                                            if( strlen($_POST['materiel'])<4 ) $test .= "<div  class='alert alert-danger'>* Le Nom de materiel doit etre au moins 4c. !</div>";
                                            
                                            if(strlen($test)==0)
                                            {
                                                require_once(dos.'mvc/c/mail.php');
                                                require_once(dos.'mvc/m/client.php'); 
                                                $clt = ClientM::get($_SESSION['id_client']);
                                                $body = "<h1><u>Nouveau Demande de Reparation</u></h1><b><br>Categorie : ".$_POST['categorie']."<br>Materiel : ".$_POST['materiel']."<br>Description : ".$_POST['des']."<br>Tel : $clt->tel<br>E-mail : $clt->email<br></b>" ;
                                                confirmer( 'redouani2002@gmail.com','SOPSI','',$body,'Demande Reparation' );
                                            }
                                        }
                                        
                                        $categories = CategorieM::getAll();
                                        include(dos.'mvc/v/client/demande_reparation.php');
                                        break;
 
            
            case 'commandes'        :   require_once(dos.'mvc/m/client.php'); 
                                        require_once(dos.'mvc/m/commande.php'); 
                                        $client = ClientM::get($_SESSION['id_client']); 
                                        switch( isset($this->req->args[0])?$this->req->args[0]:'')
                                        {
                                            case 'non_valide'   : $commandes = CommandeM::getCommandes( $_SESSION['id_client'],0 ); break;
                                            case 'valide'       : $commandes = CommandeM::getCommandes( $_SESSION['id_client'],1 ); break;
                                            default             : $commandes = CommandeM::getCommandes( $_SESSION['id_client'],2 ); break;
                                        } 
                                        include(dos.'mvc/v/client/mes_commandes.php'); 
                                        break; 
                                        
                                
            case 'panier'           :   if( $_POST['afficher_panier'] )
                                        {
                                            $panier=null; 
                                            require_once(dos.'mvc/m/commande.php'); 
                                            $commande   = CommandeM::get($_POST['id_cmd']); 
                                            
                                            if($commande!=null ){
                                                require_once(dos.'mvc/m/panier.php');
                                                $panier     = PanierM::getPanier($commande->panier);
                                            }
                                            
                                            if($panier!=null)
                                                include(dos.'mvc/v/client/panier.php');
                                            else include(dos.'mvc/v/404.php');
                                        }
                                        else include(dos.'mvc/v/404.php');
                                        break; 
                                
                                
            case 'modifier_code'    :   if( isset($_POST['code']) && isset($_POST['ncode']) && isset($_POST['rncode']))
                                        {
                                            require_once(dos.'mvc/m/client.php');
                                            $client = ClientM::get($_SESSION['id_client']);
                                            
                                            if(strcmp( $_POST['code'],$client->code)==0 )
                                            {
                                                if(strcmp($_POST['ncode'],$_POST['rncode'])==0)
                                                {
                                                    ClientM::modfier_code($client->id,$_POST['ncode']); 
                                                    echo "<div class='alert-success alert'><span class='fa fa-check' style='font-size:20;'></span> Modification Reuissite</div>";
                                                }
                                                else echo "<div class='alert-danger alert'><span class='fa fa-exclamation-triangle fa-lg'></span> &nbsp;Les deux Codes sont d&eacute;ff&eacute;rents !</div>";
                                            }
                                            else echo "<div class='alert-danger alert'><span class='fa fa-exclamation-triangle fa-lg'></span> &nbsp; Code client incorect !</div>"; 
                                        }
                                        else echo"" ;
                                        break;
                                
            default                 :   $client = ClientM::get($_SESSION['id_client']); 
                                        $acc=1; 
                                        include(dos.'mvc/v/client/client.php'); 
                                        break;
        }
        else
        switch($this->req->action)
        {
            case 'connecter'        :   if( isset($_POST['cin']) && isset($_POST['code_client']) )
                                        {
                                        require_once(dos.'mvc/m/client.php'); 
                                        $client = ClientM::connecter($_POST['cin'],$_POST['code_client']); 
                                        if($client) echo '<script>location.href="/client/compte";</script>';
                                        else        echo '<div class="alert-danger alert"><span class="fa fa-exclamation-triangle fa-lg"></span> &nbsp;CIN ou Code incorrect !</div>';  
                                        }
                                        else echo '<script>location.href="/";</script>';
                                        break;  
                        
            case 'nouveau'          :   if(isset($_POST['ajouter_client'])) 
                                        {
                                            require_once('validation.class.php');
                                            
                                            $test = Validation::validerInfosUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email']);
                                            $test.= Validation::validerInfosClient($_POST['cin'],$_POST['tel'],$_POST['adresse']);
                                            
                                            if( ClientM::exist($_POST['cin'],$_POST['email']) != -1  ) $test .= "<div  class='alert-danger'>* CIN ou E-mail d&eacute;ja existe !!</div>";  
                                                               
                                            if(strlen($test) == 0)
                                            {
                                                $code = uniqid(srand(),false);
                                                require_once(dos.'mvc/c/mail.php');
                                                confirmer($_POST['email'],$_POST['nom'],$code);
                                                
                                                ClientM::ajouter
                                                (
                                                    $_POST['nom'],
                                                    $_POST['prenom'],
                                                    $_POST['age'],
                                                    $_POST['email'],
                                                    $_POST['cin'], 
                                                    $_POST['adresse'],
                                                    $_POST['tel'],
                                                    $code
                                                );
                                                $ok = 1;  
                                            }
                                        } 
                                        include(dos."mvc/v/client/nouveau_client.php"); 
                                        break;
        
            case 'oublier'          :   if(isset($_POST['oublier']))
                                        {
                                            require_once(dos.'mvc/c/mail.php'); 
                                            $inf = ClientM::exist($_POST['cin'],$_POST['email']);
                                            if($inf != -1)
                                            {
                                                confirmer($_POST['email'],$inf[0]['nom'],$inf[0]['code']); 
                                                $ok = "<div class='alert alert-success'>Veillez consulter votre E-mail !</div>";
                                            }
                                            else $ok = "<div class='alert alert-warning'>Ce client n'existe pas !</div>";
                                        }
                                        include(dos.'mvc/v/client/oublier.php');
                                        break;
                                        
            default                 :   header('location: /'); break;
        }
    }
}

?>