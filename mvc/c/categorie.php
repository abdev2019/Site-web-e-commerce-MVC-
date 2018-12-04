<?php

    class CategorieC
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
                case 'ajouter'  :   if(isset($_POST['ajouter']))
                                    {
                                        require_once(dos."mvc/m/categorie.php"); 
                                        CategorieM::ajouter( $_POST['nvnom'] );
                                        header('location: /admin/gerer/categorie/?_add' );
                                    } break;
                                    
                case 'modifier'  :   if(isset($_POST['modifier']))
                                    {
                                        require_once(dos."mvc/m/categorie.php"); 
                                        CategorieM::modifier( $_POST['id'],$_POST['nom'] );
                                        header('location: /admin/gerer/categorie/?_mod' );
                                    } break;
                                    
                case 'suprimer'  :   if(isset($_POST['suprimer']))
                                    {
                                        require_once(dos."mvc/m/categorie.php"); 
                                        CategorieM::suprimer( $_POST['id'] );
                                        header('location: /admin/gerer/categorie/?_sup' );
                                    } break;
                                     
                                    
                default :           { 
                                        require_once(dos."mvc/m/marque.php");
                                        $marques = MarqueM::getAll();
                                        $categories = CategorieM::getAll();
                                        include(dos."mvc/v/categories.php");
                                        break;
                                    }
             }
        }
     }

?>