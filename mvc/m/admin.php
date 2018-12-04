<?php


require_once('utilisateur.php');

class AdminM extends Utilisateur
{  
    private $user;
    private $pass;
    
    public function __construct($id,$nom,$prenom,$age,$email,$user,$pass)
    { 
        parent::__construct($id,$nom,$prenom,$age,$email); 
            $this->user          = $user;
            $this->pass      = $pass; 
    } 
            
            
    public static function connecter($user,$pass)
    {
        $infos = SOPSI::get( "select * from admin a,utilisateur u  where u.id=a.id  and user=".SOPSI::toString($user)." and password=".SOPSI::toString($pass) ); 
        if( count($infos) )
        {
            $_SESSION['id_admin']   = $infos[0]['id'];
            $_SESSION['user_admin'] = $user;
            $_SESSION['pass_admin'] = $pass;
            return new AdminM( $infos[0]['id'],$infos[0]['nom'],$infos[0]['prenom'],$infos[0]['age'],$infos[0]['email'],$infos[0]['user'],$infos[0]['password'] );
        }
        return false;
    }
}


?>