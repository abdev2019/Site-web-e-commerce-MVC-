<?php

require_once('sopsi.php');

class CommandeM
{
    public $id;
    public $client;
    public $panier;
    public $date;
    public $manier_vente;
    public $valide;
    
    public function __construct($id,$date,$manier,$panier,$client,$valide)
    {  
        $this->id           = $id; 
        $this->date         = $date;
        $this->manier_vente = $manier;
        
        $this->panier       = $panier;
        $this->client       = $client; 
        $this->valide       = $valide;
    }
    
    public static function ajouter($client,$panier,$manier_vente='pas encore',$valide=0){ SOPSI::set("insert into commande values('',$client,$panier,'".date('Y-m-d G:i:s')."','$manier_vente',$valide)"); }
    public static function modifier($id,$manier_vente,$valide)
    { 
        SOPSI::set  ("update commande set 
                        valide=$valide, 
                        manier_vente = $manier_vente where id=$id"
                    ); 
    } 
    public static function suprimer($id){ SOPSI::set("delete from commande where id=$id"); }
    
    public static function accepter($id){ SOPSI::set("update commande set valide=1 where id=$id"); }
    public static function refuser($id){ SOPSI::set("update commande set valide=0 where id=$id"); }            
    
    ///////
    public static function getCommandes($id,$where)
    {
        $conditions = "";
        switch($where)
        {
            case 0 : $conditions = " and valide=0"; break;
            case 1 : $conditions = " and valide=1"; break; 
        }
        $infos = SOPSI::get("select * from commande where id_client=$id ".$conditions); 
        
        $cmds=array();
        foreach( $infos as $cmd )
            $cmds[] = new CommandeM($cmd["id"],$cmd['date'],$cmd['manier_vente'],$cmd['id_panier'],$cmd['id_client'],$cmd['valide']?'<b class="alert-success">oui</b>':'<b class="alert-warning">non</b>');
        
        return $cmds;
    }
    public static function get($id)
    {
        $infos = SOPSI::get("select * from commande where id=$id ");  
        if(count($infos)){
            $cmd = new CommandeM($infos[0]["id"],$infos[0]['date'],$infos[0]['manier_vente'],$infos[0]['id_panier'],$infos[0]['id_client'],$infos[0]['valide']?'<b class="alert-success">oui</b>':'<b class="alert-warning">non</b>');
            return $cmd;
        }
        return null;
    }
    
    public static function getAll()
    {
        $infos = SOPSI::get('select * from commande order by id'); 
        $arr = array(); 
        foreach($infos as $info) 
            $arr[] = new CommandeM($info["id"],$info['date'],$info['manier_vente'],$info['id_panier'],$info['id_client'],$info['valide']?'<b class="alert-success">oui</b>':'<b class="alert-warning">non</b>'); 
        return $arr;  
    }
}

?>