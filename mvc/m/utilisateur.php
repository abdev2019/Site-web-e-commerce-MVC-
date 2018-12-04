<?php

require_once('sopsi.php');

class Utilisateur
{
    public $id;
    public $nom;
    public $prenom;
    public $age;
    public $email;
    
    public function __construct($id,$nom,$prenom,$age,$email)
    {  
        $this->id           = $id;
        $this->nom          = $nom;
        $this->prenom       = $prenom;
        $this->age          = $age; 
        $this->email        = $email;
    }
    public static function ajouter($nom,$prenom,$age,$email)
    { 
        SOPSI::set( "insert into utilisateur values('',".SOPSI::toString($nom).",".SOPSI::toString($prenom).",$age,".SOPSI::toString($email).")");
        $id = SOPSI::get("select max(id) as id from utilisateur");  
        return $id[0]['id'];
    }
    public static function modifier($id,$nom,$prenom,$age,$email)
    { 
        SOPSI::set  ("update utilisateur set 
                        nom=".SOPSI::toString($nom).",
                        prenom=".SOPSI::toString($prenom)." ,
                        age = $age,
                        email=".SOPSI::toString($email)."
                        where id=$id "
                    ); 
    } 
    public static function suprimer($id){ SOPSI::set("delete from utilisateur where id=$id"); }
    
    ///////
    public static function get($id)
    {
        $infos = SOPSI::get("select * from utilisateur where id=$id");
        return new Utilisateur($infos[0]["id"],$infos[0]['nom'],$infos[0]['prenom'],$infos[0]['age'],$infos[0]['email']);
    }
}

?>