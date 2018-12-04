<?php

require_once('sopsi.php');

class MarqueM
{
    public $id;
    public $nom;
    public $logo;
    
    
    public function __construct($id,$nom,$logo)
    { 
        $this->id   = $id;
        $this->nom  = $nom;
        $this->logo = $logo;
    }
    
    public static function ajouter($nom,$logo='0.png'){ SOPSI::set("insert into marque values('',".SOPSI::toString($nom).",".SOPSI::toString($logo).");"); }
    public static function modifier($id,$int,$logo='0.png') 
    {  
        SOPSI::set  ("update marque set  
                        nom=".SOPSI::toString($int)."  , 
                        logo=".SOPSI::toString($logo)."  
                        where id=$id " 
                    ); 
    } 
    public static function suprimer($id){ SOPSI::set("delete from marque where id=$id"); }
    
    public static function getAll()
    {
        $infos = SOPSI::get('select * from marque order by id'); 
        $arr = array(); 
        foreach($infos as $inf) 
            $arr[] = new MarqueM($inf["id"],$inf['nom'],$inf['logo']); 
        return $arr;  
    }
    
    public static function get($id)
    {
        $infos = SOPSI::get("select * from marque where id=$id"); 
        return new MarqueM($infos[0]["id"],$infos[0]['nom'],$infos[0]['logo']); 
    }
    
    public function __toString(){ return $this->nom; }
}


?>