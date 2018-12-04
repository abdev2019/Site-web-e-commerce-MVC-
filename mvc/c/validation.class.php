<?php 
  
 
 
/** ****************************************************** Validation ***************************************************************************** **/
class Validation
{  
    
        public function validerInfosUtilisateur( $nom,$prenom,$age,$email )
        {
            $str = "";
            if( !Validation::validerNom($nom) )      $str .= "<div class='alert-danger'>* Le nom n'est pas au bon format !</div>";
            if( !Validation::validerNom($prenom) )   $str .= "<div class='alert-danger'>* Le prenom n'est pas au bon format !</div>";
            if( !Validation::validerAge($age) )      $str .= "<div class='alert-danger'>* L'age n'est pas au bon format !</div>";
            if( !Validation::validerEmail($email) )  $str .= "<div class='alert-danger'>* L'e-mail n'est pas au bon format !</div>";
            return $str;
        }
        
        
        public function validerInfosClient($cin,$tel,$adr)
        {
            $str = "";
            if( !Validation::validerCin($cin) )      $str .= "<div class='alert-danger'>* Le cin n'est pas au bon format !</div>";
            if( !Validation::validerTel($tel) )      $str .= "<div class='alert-danger'>* Le numero telephone n'est pas au bon format !</div>"; 
            if( !Validation::validerAdresse($adr) )  $str .= "<div class='alert-danger'>* L'adresse n'est pas au bon format !</div>";
            return $str;
        }
    
    
        public static function validerNom($nom)             
        {  
            if
            (
                !preg_match("/^[a-zA-Z -]*$/",$nom) || 
                strlen(self::deleteSpace($nom))<strlen($nom) ||  
                strlen($nom) == 0 ||
                strlen($nom) > 64 || 
                strlen($nom)<3 
            )
            return 0;
            return 1;
        } 
        
        public static function validerAdresse($adr)             
        {  
            if
            (
                !preg_match("/^[a-zA-Z0-9 - :,.;]*$/",$adr) || 
                strlen(self::deleteSpace($adr))<strlen($adr) ||  
                strlen($adr) == 0 ||  
                strlen($adr)<6 
            )
            return 0;
            return 1;
        } 
         
        public static function validerCin($cin)             
        { 
            if
            (
                strlen($cin) == 8 &&
                ctype_alpha( substr($cin,0,2) ) &&
                is_numeric( substr($cin,2,7) )
            ) 
            return 1; 
            return 0; 
        }
        
        public static function validerEmail($eml){ if( !filter_var($eml,FILTER_VALIDATE_EMAIL) ) return 0; return 1;  } 
        public static function validerAge($age){ if( is_numeric($age) && $age<80 && $age>20 ) return 1; return 0; } 
        public static function validerTel($tel){ if( is_numeric($tel) && strlen($tel)==10 && strcmp(substr($tel,0,2),'06')==0 ) return 1; return 0; } 
    
        public static function deleteSpace($what){ return trim(preg_replace('/\s\s+/', ' ', str_replace("\n", " ", $what))); }
}


 

?>