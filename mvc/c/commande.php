<?php


class CommandeC
{
    
    public $req;
    
        public function __construct($req)
        {
            $this->req      = $req; 
            $this->load();
        }
        
        public function load()
        {
            switch($this->req->action)
            {        
                case 'nouveau'  :   if( isset($_SESSION['produits']) && count($_SESSION['produits'])>0  )
                                    {
                                        require_once(dos."mvc/m/produit.php");
                                        
                                            $produits = array();
                                            if(isset($_POST['modifier'])) foreach( $_SESSION['produits'] as $id ) $produits[] =  ProduitM::get($id);
                                            else
                                            {
                                                foreach( $_SESSION['produits'] as $id ) 
                                                {
                                                    $_SESSION['quantites'][$id] = isset($_POST['quantite'.$id])?$_POST['quantite'.$id]:1; 
                                                    $produits[] =  ProduitM::get($id);
                                                }
                                                isset($_POST['total_prix'])?$_SESSION['total_prix'] = $_POST['total_prix']:'';
                                            }
                                            
                                            include(dos."mvc/v/commande.php");  
                                            break;
                                    }
                                    else header('location: /panier/?vide');
                                    break;  
                
                
                case 'valider'  :   if(isset($_POST['cin'],$_POST['code_client']))
                                    {
                                        require_once(dos.'mvc/m/client.php');
                                        $client = ClientM::connecter($_POST['cin'],$_POST['code_client']);
                                        if($client!=null)
                                        {
                                            require_once(dos.'mvc/m/panier.php');
                                            require_once(dos.'mvc/m/commande.php'); 
                                                                                       
                                            // archifage  
                                            // les panier commandé 
                                            $id = PanierM::ajouter($_SESSION['total_prix'],$_SESSION['id_client']);
                                            foreach($_SESSION['produits'] as $prd) PanierM::ajouterUnProduit($prd,$id,$_SESSION['quantites'][$prd]); 
                                            
                                            // Commandes
                                            CommandeM::ajouter($client->id,$id);
                                            
                                            echo('<script>location.href="/client/commandes/?_cmd";</script>');
                                        }
                                        else
                                        {
                                            echo '<div class="alert-danger alert"><span class="fa fa-exclamation-triangle fa-lg"></span> &nbsp;CIN ou Code incorrect !</div>';
                                        }
                                    }
                                    
                case 'gerer'    :   if(isset($_POST['accepter']))
                                    {
                                        require_once( dos.'mvc/m/commande.php' );
                                        CommandeM::accepter($_POST['id']);
                                        header("location: /admin/gerer/commande/");
                                    }
                                    else if(isset($_POST['refuser']))
                                    {
                                        require_once( dos.'mvc/m/commande.php' );
                                        CommandeM::refuser($_POST['id']);
                                        header("location: /admin/gerer/commande/");
                                    } 
                                    break;
                                     
                                     
                default         :   if(isset($_POST['commander_etape_1']))
                                    {
                                        require_once(dos."mvc/m/commande.php"); 
                                        include(dos."mvc/v/commande.php");
                                    }
                                    break;  
            }
        }
        
}


?>