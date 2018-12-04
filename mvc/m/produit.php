<?php


require_once('sopsi.php');

class ProduitM
{
    public $id;
    public $nom;
    public $categorie;
    public $prix;
    public $description; 
    public $marque;
    public $dossier;
    
    public static $nbr=0;
    public static $req = "select * from produit p";
    
    public function __construct($id='',$nom='',$cat='',$pri='',$des='',$mar='',$dossier='')
    { 
            $this->id           = $id;
            $this->nom          = $nom;
            $this->categorie    = $cat;
            $this->prix         = $pri;
            $this->description  = $des; 
            $this->marque       = $mar;
            $this->dossier      = $dossier;
    }
    
    public static function ajouter($nom,$cat,$pri,$des,$marque,$dos="abcdefgh"){ SOPSI::set("insert into produit values('',$cat,".SOPSI::toString($nom).",$pri,".SOPSI::toString($des).",$marque,".SOPSI::toString($dos).")"); } 
    public static function suprimer($id){ SOPSI::set("delete from produit where id=$id"); }
    public static function modifier($id,$nom,$cat,$pri,$des,$marque)
    {
        SOPSI::set  ("update produit set 
                        nom=".SOPSI::toString($nom).",
                        id_categorie=$cat ,
                        prix = $pri ,
                        description=".SOPSI::toString($des).",
                        marque=$marque 
                        where id=$id "
                    ); 
    }  
    
    
    // exist
    public static function exist($id){ if( SOPSI::count("select id from produit where id=$id") ) return true; return false; }
    
    /** All **/
    public static function getAll($page=1)
    {
        ProduitM::$nbr = SOPSI::count(self::$req);
        if(ProduitM::$nbr)
        {
            if($page=='A') $res = SOPSI::get(self::$req);
            else $res = SOPSI::get(self::$req." LIMIT ".(($page-1)*12).",12 "); 
            return self::getInstances($res);
        }
        return null;
    }
    
    /** by categorie **/
    public static function getByCategorie($val,$page=1)
    {
        ProduitM::$nbr = SOPSI::count(self::$req." where id_categorie=$val");
        if(ProduitM::$nbr)
        { 
            $res = SOPSI::get( self::$req." where id_categorie=$val LIMIT ".(($page-1)*12).",12 "); 
            return self::getInstances($res);
        }
        return null;
    }
    
    /** by marque **/
    public static function getByMarque($val,$page=1)
    {  
        ProduitM::$nbr = SOPSI::count(self::$req." where marque=$val"); 
        if(ProduitM::$nbr)
        { 
            $res = SOPSI::get( self::$req." where marque=$val LIMIT ".(($page-1)*12).",12 "); 
            return self::getInstances($res);
        }
        return null;
    } 
    
    /** by text **/
    public static function rechercher($val,$page=1)
    {
        $str ='(';$mots = explode('%20',$val);
        for($i=0;$i<count($mots)-1;$i++)$str .= " INSTR(p.nom, ".SOPSI::toString($mots[$i])." )>0 or INSTR(p.description, ".SOPSI::toString($mots[$i])." )>0 or " ;
        $str .= " INSTR(p.nom, ".SOPSI::toString($mots[$i])." )>0 or INSTR(p.description, ".SOPSI::toString($mots[$i])." )>0 )";
         
        ProduitM::$nbr = SOPSI::count( self::$req." where $str"); 
        if(ProduitM::$nbr)
        {
            $res   = SOPSI::get(self::$req." where $str LIMIT ".(($page-1)*12).",12 ") ;
            return self::getInstances($res);  
        }
        return null;
    }
    
    /** get produit **/
    public static function get($id)
    {
        $infos = SOPSI::get( self::$req." where p.id=$id") ;
        if(count($infos))
        {
            require_once('categorie.php');
            require_once('marque.php');
            
            return new ProduitM($infos[0]['id'],$infos[0]['nom'],(CategorieM::get($infos[0]['id_categorie'])),$infos[0]['prix'],$infos[0]['description'],MarqueM::get($infos[0]['marque']),$infos[0]['dossier']);
        }
        return null;
    } 
    
    /** get list produit **/
    public static function getInstances($res){
        require_once('categorie.php');
        require_once('marque.php');
        
        foreach($res as $infos)
            $produits[] = new ProduitM($infos['id'],$infos['nom'],CategorieM::get($infos['id_categorie']),$infos['prix'],$infos['description'],MarqueM::get($infos['marque']), $infos['dossier']);
        return $produits; 
    }
}
 
?>


