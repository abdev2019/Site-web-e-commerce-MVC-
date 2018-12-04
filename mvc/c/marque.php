<?php

    class MarqueC
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
                                        require_once(dos."mvc/m/marque.php");  
                                        $test = chargerImage($_FILES['fichier']['name'],dos.'public/images/marque/');
                                        if($test)
                                        {
                                            MarqueM::ajouter( $_POST['nvnom'], $test.'.png' );
                                            header('location: /admin/gerer/marque/?_add' );
                                        }
                                        else header('location: /admin/gerer/marque/?_add_' );
                                    } break;
                                    
                case 'modifier'  :  if(isset($_POST['modifier']))
                                    {
                                        require_once(dos."mvc/m/marque.php"); 
                                        MarqueM::modifier( $_POST['id'],$_POST['nom'] );
                                        header('location: /admin/gerer/marque/?_mod' );
                                    } break;
                                    
                case 'suprimer'  :  if(isset($_POST['suprimer']))
                                    {
                                        require_once(dos."mvc/m/marque.php"); 
                                        MarqueM::suprimer( $_POST['id'] );
                                        header('location: /admin/gerer/marque/?_sup' );
                                    } break;     
             }
        }
    }

?>