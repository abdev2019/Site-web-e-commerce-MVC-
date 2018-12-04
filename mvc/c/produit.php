<?php

     class ProduitC
     {
        public $req;
        
        public function __construct($req)
        { 
            $this->req      = $req; 
            $this->load();
        } 
        
        public function load()
        {
             $dos = dos."mvc/v/produit/"; 
             if( !isset($_GET['page']) || !is_numeric($_GET['page']) ) $_GET['page']=1;
             
             switch($this->req->action)
             {
                case 'ajouter'  :   if(isset($_POST['ajouter']))
                                    {
                                        $dos = chargerImagesProduit();
                                        require_once(dos."mvc/m/produit.php");  
                                        
                                        ProduitM::ajouter( $_POST['nom'],$_POST['categorie'],$_POST['prix'],$_POST['description'],$_POST['marque'],$dos );
                                        header('location: /admin/gerer/produit/?_add' );
                                    } break;
                                    
                case 'modifier'  :  if(isset($_POST['modifier']))
                                    {
                                        require_once(dos."mvc/m/produit.php"); 
                                        ProduitM::modifier( $_POST['id'],$_POST['nom'],$_POST['categorie'],$_POST['prix'],$_POST['description'],$_POST['marque'] );
                                        header('location: /admin/gerer/produit/?_mod' );
                                    } break;
                                    
                case 'suprimer'  :  if(isset($_POST['suprimer']))
                                    {
                                        require_once(dos."mvc/m/produit.php"); 
                                        ProduitM::suprimer( $_POST['id'] );
                                        header('location: /admin/gerer/produit/?_sup' );
                                    } break;  
                                    
                                    

                case 'categorie':       $produits = ProduitM::getByCategorie( $this->req->args[0],$_GET['page'] ); 
                                        require_once(dos.'mvc/m/categorie.php');
                                        $type = CategorieM::get($this->req->args[0]);
                                        include($dos."produits.php");
                                        break;
                                        
                                        
                case 'marque':          $produits = ProduitM::getByMarque( $this->req->args[0],$_GET['page'] ); 
                                        require_once(dos.'mvc/m/marque.php');
                                        $type = MarqueM::get($this->req->args[0]);
                                        include($dos."produits.php");
                                        break;
                                        
                case 'recherche':       $rech='';
                                        if(isset($this->req->args[0]))$produits = ProduitM::rechercher( $rech = $this->req->args[0],$_GET['page'] );
                                        else $produits=null; 
                                        $type=$rech;
                                        include($dos."produits.php");
                                        break;
                                    
                                    
                case 'details'  :   if(isset($this->req->args[0]))  
                                    {
                                        $produit = ProduitM::get( $this->req->args[0] );
                                        if($produit != null) 
                                        {
                                            $images =  array_slice(scandir($dos."images/".$produit->dossier),2)  ; 
                                            include($dos."produit.php");
                                        }
                                        else include($dos."404_produit.php");
                                        break;
                                    }
                
                case 'ajouter_au_panier' : 
                                        if(isset($this->req->args[0]))  
                                        {
                                            
                                            break;
                                        }
                                     
                default :               $produits = ProduitM::getAll( $_SERVER['page'] = $_GET['page'] );
                                        $type = "R&eacute;cents"    ;
                                        include($dos."produits.php");
                                        break;
             }
        }
     }
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
     
function pagination($when,$nbr=4)
{
    switch($when) 
    {
        case 'b' :  if($_SERVER['page'] == ceil(ProduitM::$nbr/$nbr)-1 || $_SERVER['page'] == ceil(ProduitM::$nbr/$nbr)   ) print ceil(ProduitM::$nbr/$nbr)-2; else 
                    if($_SERVER['page']==2 || $_SERVER['page']==1) print 1;   
                    else print $_SERVER['page']-1;  
                    break;
                    
        case 'n' :  if($_SERVER['page'] == ceil(ProduitM::$nbr/$nbr)-1 || $_SERVER['page'] == ceil(ProduitM::$nbr/$nbr) ) print ceil(ProduitM::$nbr/$nbr)-1;   else 
                    if($_SERVER['page']==2 || $_SERVER['page']==1) print 2; 
                    else print $_SERVER['page']; 
                    break;
        
        case 'a' :  if($_SERVER['page'] == ceil(ProduitM::$nbr/$nbr)-1 || $_SERVER['page'] == ceil(ProduitM::$nbr/$nbr) ) print ceil(ProduitM::$nbr/$nbr); else 
                    if($_SERVER['page']==2 || $_SERVER['page']==1) print 3;  
                     else print $_SERVER['page']+1; 
                    break;
    }
}
     
?>