<?php

require_once('sopsi.php');


class PanierM
{
    public $id;
    public $produits=array(); 
    public $total;
    
    public function __construct($id,$prds,$total)
    {
        $this->id = $id; 
        $this->produits = $prds;
        $this->total    = $total;
    }
    
    //produit panier
    public static function ajouterUnProduit($produit,$panier,$qte)  { SOPSI::set("insert into produit_panier values($panier,$produit,$qte)"); } 
    public static function retirerUnProduit($id_panier,$id_produit) { SOPSI::set("delete from produit_panier where id_panier=$id_panier and id_produit=$id_produit"); }
    
    // panier
    public static function suprimer($id)                            { SOPSI::set("delete from panier where id_panier=$id");  }
    public static function ajouter($total,$id)                          
    { 
        SOPSI::set("insert into panier values('',$total,$id)");
        $id =  SOPSI::get("select max(id) as id from panier");  
        return $id[0]['id'];
    }
    
    //recuperations
    public static function getPanier($id)
    {
        $panier=null;
        
        require_once('produit.php'); 
        $infos = SOPSI::get("select * from panier,produit_panier where id=id_panier and id_panier=$id"); 
        if(count($infos)){
            foreach($infos as $id) 
            {
                $produits[$id['id_produit']]['prd' ] = ProduitM::get($id['id_produit']);
                $produits[$id['id_produit']]['qte'] = $id['quantite'];
            } 
            $panier = new PanierM($infos[0]['id'],$produits,$infos[0]['prix_total']); 
        }
        
    return $panier;
    }
    
}


?>