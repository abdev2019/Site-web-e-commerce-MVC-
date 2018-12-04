<?php

     class AccueilC
     {
        public function __construct()
        {
            $this->load();
        }
        
        public function load()
        {
            require_once(dos.'mvc/m/produit.php');
            require_once(dos."mvc/m/marque.php");
            
            $marques = MarqueM::getAll();
            $recent = ProduitM::getAll(1); 
            
            include(dos."mvc/v/index.php");   
        }
     }
     
     
?>