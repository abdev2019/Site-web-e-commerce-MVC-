<?php 

require_once('utilisateur.php');
require_once('sopsi.php');

class ClientM extends Utilisateur
{ 
    public $cin;
    public $adresse;
    public $tel;
    public $code;
    
    public function __construct($id,$nom,$prenom,$age,$email,$cin,$adresse,$tel,$code)
    {  
        parent::__construct($id,$nom,$prenom,$age,$email); 
        $this->cin          = $cin;
        $this->adresse      = $adresse;
        $this->tel          = $tel;
        $this->code         = $code;
    }
    
    public static function ajouter($nom,$prenom,$age,$email,$cin,$adresse,$tel,$code)
    {  
        $id = parent::ajouter($nom,$prenom,$age,$email); 
        SOPSI::set("insert into client values($id,".SOPSI::toString($cin).",".SOPSI::toString($adresse).",".SOPSI::toString($tel).",".SOPSI::toString($code).")");
        return $id; 
    }
    public static function modifier($id,$nom,$prenom,$age,$email,$cin,$adresse,$tel)
    {
        parent::modifier($id,$nom,$prenom,$age,$email);
        SOPSI::set  ("update client set 
                        cin     =".SOPSI::toString($cin).",
                        adresse =".SOPSI::toString($adresse)." ,
                        tel     =".SOPSI::toString($tel)."  
                        where id=$id "
                    ); 
    } 
    public static function suprimer($id){ SOPSI::set("delete from client where id=$id"); }
    
    public static function modfier_code($id,$code){ SOPSI::set("update client set code=".SOPSI::toString($code)." where id=$id"); }
    
    ///////////////
    public static function get($id)
    {
        $infos = SOPSI::get("select * from client c,utilisateur u where c.id=u.id and c.id=$id"); 
        return new ClientM($infos[0]["id"],$infos[0]['nom'],$infos[0]['prenom'],$infos[0]['age'],$infos[0]['email'],$infos[0]['cin'],$infos[0]['adresse'],$infos[0]['tel'],$infos[0]['code']);
    } 
    
    
    public static function exist($cin,$eml)
    {
        $infos = SOPSI::get("select code,nom from client c,utilisateur u where c.id=u.id and cin=".SOPSI::toString($cin)." and email=".SOPSI::toString($eml) );
        if(count($infos)) return $infos;
        return -1;
    }
    
    public static function connecter($cin,$code)
    {
        $infos = SOPSI::get( "select * from client c,utilisateur u where c.id=u.id and cin=".SOPSI::toString($cin)." and code=".SOPSI::toString($code) ); 
        if( count($infos) )
        {
            $_SESSION['id_client']  = $infos[0]['id'];
            $_SESSION['cin_client'] = $cin;
            $_SESSION['code_client']= $code;
            return new ClientM( $infos[0]['id'],$infos[0]['nom'],$infos[0]['prenom'],$infos[0]['age'],$infos[0]['email'],$infos[0]['cin'],$infos[0]['adresse'],$infos[0]['tel'],$infos[0]['code'] );
        }
        return false;
    }
    
    public static function getAll($id='')
    {
        if($id) $infos = SOPSI::get('select * from client c,utilisateur u where c.id=u.id and c.id='.$id.' order by c.id'); 
        else $infos = SOPSI::get('select * from client c,utilisateur u where c.id=u.id order by c.id'); 
        $arr = array(); 
        foreach($infos as $info) 
            $arr[] = new ClientM($info['id'],$info['nom'],$info['prenom'],$info['age'],$info['email'],$info['cin'],$info['adresse'],$info['tel'],$info['code']); 
        return $arr;  
    }
    
}
 

?>