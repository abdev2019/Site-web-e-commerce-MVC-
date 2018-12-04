<?php

require_once('sopsi.php');

class CategorieM
{
    public $id;
    public $nom;
    public $description;
    
    
    public function __construct($id,$nom)
    { 
        $this->id   = $id;
        $this->nom  = $nom;
    }
    
    public static function ajouter($int)
    { 
        SOPSI::set("insert into categorie values('',".SOPSI::toString($int).")"); 
    }
    
    public static function modifier($id,$int)
    { 
        SOPSI::set  ("update categorie set 
                        intitule=".SOPSI::toString($int)." 
                        where id=$id "
                    ); 
    }
    
    public static function suprimer($id){ SOPSI::set("delete from categorie where id=$id"); }
    
    public static function getAll()
    {
        $infos = SOPSI::get('select * from categorie order by id'); 
        $arr = array();
        
        foreach($infos as $inf) 
            $arr[] = new CategorieM($inf["id"],$inf['intitule']);
            
        return $arr;  
    }
    
    public static function get($id)
    {
        $infos = SOPSI::get("select * from categorie where id=$id"); 
        return new CategorieM($infos[0]["id"],$infos[0]['intitule']); 
    }
    
    public function __toString(){ return $this->nom; }
}


?>