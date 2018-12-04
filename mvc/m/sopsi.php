<?php
 

class SOPSI
{
    private static $serveur  =   'mysql:host=localhost';
   	private static $bdd      =   'dbname=sopsi';   		
   	private static $user     =   'root' ;    		
   	private static $mdp      =   '' ;
     

    public static function getPdo() { return new PDO(self::$serveur.';'.self::$bdd, self::$user, self::$mdp);  }
    
    public static function get($req)       
    { 
        $pdo = self::getPdo();
        $res = $pdo->query($req); 
        unset($pdo);
        return $res->fetchAll(PDO::FETCH_ASSOC); 
    }
    public static function count($req)
    {
        $pdo = self::getPdo();
        $res = $pdo->query($req); 
        unset($pdo);
        return $res->rowCount();
    }
    public static function set($req)       
    { 
        $pdo = self::getPdo(); 
        $pdo->query($req); 
        unset($pdo);
    } 
    public static function toString($str)  
    { 
        $pdo = self::getPdo(); 
        $res = $pdo->quote($str); 
        unset($pdo);
        return $res ;
    }
}

    function chargerImage($nom_fichier,$dossier)
    {
        $id_I = uniqid(rand(),false);  
        echo $dossier = $dossier.$id_I.".png" ;
        $fichier = $_FILES['fichier']['tmp_name'];  
        $type = strtolower( substr( strrchr($nom_fichier,'.') ,0) ); 
        
        if( strrchr(".jpg .jpeg .png .bmp",$type) && move_uploaded_file($fichier,$dossier) )
        {   
            return $id_I;  
        }
        return 0;
    }
    
    function chargerImagesProduit()
    { 
        $dos = uniqid(rand(),false);  
        mkdir(dos."mvc/v/produit/images/".$dos);  
        
        for( $i=0; $i<count($_FILES['images']['name']); $i++ ) 
        {
            $type = substr(strrchr($_FILES['images']['name'][$i],'.'),1);
          
            echo $dossier    = dos."mvc/v/produit/images/$dos/".($i+1).".png" ;
            $fichier    = $_FILES['images']['tmp_name'][$i]; 
                
            if( strchr(".jpg .jpeg .png .bmp .gif",$type) )
            {
                //if( !
                move_uploaded_file($fichier,$dossier);// ) 
                //$err_photos[]= "Le chargement de fichier ".$_FILES['images']['name'][$i]." a echouee! ressayez !";
            }
            else   
                $err_photos[]= "Le fichier ".$_FILES['images']['name'][$i]." n'est pas disponible! (.jpg .jpeg .png .bmp sont disponibles)"; 
        } 
        
        return $dos;
    } 

?>