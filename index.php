<?php

error_reporting(0);

define('dos',$_SERVER['DOCUMENT_ROOT'].'/');
require_once(dos."mvc/c/requete.php"); 



$req = new Requete();
 
if( is_file( dos."mvc/c/".$req->control.".php" ) )
{     
    
    require_once(dos."mvc/c/".$req->control.".php");
    require_once(dos."mvc/m/".$req->control.".php");

    
    $classC = $req->control."C";   
    
    $cc = new $classC( $req );  
}

else if( empty($req->control) ){ require_once(dos."mvc/c/control.php"); new AccueilC(); }

else include(dos.'mvc/v/404.php');

 

?>