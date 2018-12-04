<?php

require_once('sopsi.php');

class ContactM
{
    private $id;
    public $utilisateur;
    public $message;
    
    public function __construct($id)
    { 
        $infos = SOPSI::get("select * from contact where id=$id");
        
        $this->id           = $infos["id"];
        $this->nom          = $infos['message']; 
    }
    
    public static function ajouter($nom,$email,$message)
    {
        SOPSI::set("insert into contact values('',".SOPSI::toString($message).",".SOPSI::toString($nom).",".SOPSI::toString($email).")"); 
    } 
    
    public static function suprimer($id){ SOPSI::set("delete from contact where id=$id"); }
}

?>