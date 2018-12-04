<?php
 
    function confirmer($eml,$nom,$code,$bd='',$s='')
    { 
        require_once(dos.'mvc/c/PHPMailer/class.phpmailer.php');
        $mail = new PHPMailer(); 
        $mail->isSMTP();
        $mail->SMTPDebug = 2;
        $mail->From = "redouani2002@gmail.com";
        $mail->FromName = "SOPSI"; 
        $mail->Host = "smtp.gmail.com" ;
        $mail->SMTPSecure = "ssl";
        $mail->Port = 465;
        $mail->SMTPAuth = true;
        $mail->Username = "redouani2002@gmail.com";
        $mail->Password = "red0606972349";  
        $mail->AddAddress("$eml","$nom");    
        $mail->WordWrap=50; 
        $mail->isHtml(true);
        
        if(strlen($bd)>0){
            if( strlen($s) ) $mail->Subject = $s;
            else $mail->Subject = "Nouveau Contact";
            $mail->Body    = $bd;
        }
        else{
            if( strlen($s) ) $mail->Subject = $s;
            else
            $mail->Subject  = 'Code Client SOPSI';
            $mail->Body = "<b>Bonjour $nom !</b><br><br>Le code client de votre Compte sur SOPSI est :<b><font color='red'>$code</font></b><br>Merci de votre inter&ecirc;t <br>sopsi.agadir@gmail.com<br>www.sopsi.net";
        }
        
        if($mail->Send()) return true;
        return false;
    }


?>