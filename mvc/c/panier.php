<?php


class PanierC
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
                case 'ajouter'  :   if( isset($_POST['ajouter_au_panier']) ) 
                                    {
                                        $_SESSION['produits'][$_POST['id']] = $_POST['id']; 
                                        header('location: '.$_GET['ref']);
                                    }
                                    else if(isset($this->req->args[0])&&is_numeric($this->req->args[0])) 
                                    {
                                        require_once(dos."mvc/m/produit.php");
                                        if( ProduitM::exist($this->req->args[0]) ) 
                                        print $_SESSION['produits'][ $this->req->args[0] ] = $this->req->args[0]; 
                                         
                                        header('location: '.(isset($_GET['ref'])?$_GET['ref']:'/' ));
                                    }
                                    break;
                                    
                case 'retirer'  :   if( isset($_POST['retirer_de_panier']) && isset($_SESSION['produits'])  )
                                    {
                                    	unset( $_SESSION['produits'][$_POST['id']] );  
                                        header('location: '.$_GET['ref']);
                                        break;
                                    }
                                     
                default         :   require_once(dos."mvc/m/produit.php");
                                    $produits = array(); 
                                    $suggests = ProduitM::getAll();
                                    
                                    foreach($_SESSION['produits'] as $id)
                                        $produits[] =  ProduitM::get($id);
                                    include(dos."mvc/v/panier.php");
                                    break;  
            }
             
        }  
        
}


?>