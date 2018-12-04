<?php


class AdminC
{ 
    
    public $req;
    
        public function __construct($req)
        {
            $this->req      = $req; 
            $this->load();
        }
        
        public function load()
        { 
            if(!isset($_SESSION['id_admin']))
            switch($this->req->action)
            {
                case 'connecter' :  if( isset($_POST['nom_utilisateur'],$_POST['mot_de_passe']) )
                                    {
                                        require_once(dos.'mvc/m/admin.php'); 
                                        $admin = AdminM::connecter($_POST['nom_utilisateur'],$_POST['mot_de_passe']); 
                                        
                                        if($admin) echo '<script>location.href="/admin/gestion";</script>';
                                        else        echo '<div class="alert-danger alert"><span class="fa fa-exclamation-triangle fa-lg"></span> &nbsp;Nom d\'utilisateur ou mot de passe incorrect !</div>';  
                                    }
                                    else echo '<script>location.href="/admin";</script>';
                                    break;  
                
                default : include(dos.'mvc/v/admin/connexion.php'); break;
            }
            
            
            else
            {
                if( $this->req->action == 'gerer' )
                switch( isset($this->req->args[0])?$this->req->args[0]:"" )
                {
                    case 'categorie':   require_once(dos.'mvc/m/categorie.php'); 
                                        $categories = CategorieM::getAll();  
                                        include(dos.'mvc/v/admin/categorie.php'); break;
                                        
                    case 'marque':      require_once(dos.'mvc/m/marque.php'); 
                                        $marques = MarqueM::getAll();  
                                        include(dos.'mvc/v/admin/marque.php'); break; 
                                        
                    case 'produit':     require_once(dos.'mvc/m/produit.php'); 
                                        require_once(dos.'mvc/m/marque.php');
                                        require_once(dos.'mvc/m/categorie.php');
                                        
                                        $produits       = ProduitM::getAll( (isset($_GET['page'])?$_GET['page']:1) );  
                                        $marques        = MarqueM::getAll();
                                        $categories     = CategorieM::getAll();
                                        
                                        include(dos.'mvc/v/admin/produit.php'); break;
                                        
                    case 'client':      require_once(dos.'mvc/m/client.php'); 
                                        $id="";
                                        if(isset($this->req->args[1]) && is_numeric($this->req->args[1])) $id = $this->req->args[1];
                                        
                                        $clients = ClientM::getAll($id);  
                                        include(dos.'mvc/v/admin/client.php'); break;
                                        
                    case 'commande':    require_once(dos.'mvc/m/commande.php'); 
                                        $commandes = CommandeM::getAll();  
                                        include(dos.'mvc/v/admin/commande.php'); break; 
                                        
                    default :           include(dos.'mvc/v/404.php');
                }
                else
                {
                    if($this->req->action == 'modifier'&&isset( $_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email'] ))
                    {
                        require_once(dos.'mvc/m/utilisateur.php');
                        require_once('validation.class.php');
                            
                        $test = Validation::validerInfosUtilisateur($_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email']);
                        
                        if(strlen($test)==0){
                            Utilisateur::modifier($_SESSION['id_admin'],$_POST['nom'],$_POST['prenom'],$_POST['age'],$_POST['email']);
                            echo "<script>location.href='/admin/?_mod';</script>"; 
                        }
                        else echo $test;
                    }
                    else{
                        require_once(dos.'mvc/m/admin.php'); 
                        $admin = AdminM::get($_SESSION['id_admin']);
                        include(dos.'mvc/v/admin/index.php');
                    }
                }
            }
        }   
}


?>