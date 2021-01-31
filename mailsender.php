<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\Exception;
 require '/home/mailer/vendor/autoload.php';
 
function send_mail($email, $oggetto, $messaggio, $path_allegato = null){
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = "smtp.office365.com"; //indirizzo del server di posta in uscita
        $mail->SMTPDebug = 0;
        $mail->Port = 587; //porta del server di posta in uscita
 	    $mail->SMTPAuth = true;
        $mail->SMTPAutoTLS = 'tls';
	    $mail->SMTPSecure = 'tls'; //tls o ssl informarsi presso il provider del vostro server di posta
        $mail->Username = "silenthpt@hotmail.com"; //la vostra mail
        $mail->Password = "Perro360"; //password per accedere alla vostra mail
        $mail->Priority    = 1; //(1 = High, 3 = Normal, 5 = low)
        $mail->setFrom('silenthpt@hotmail.com', 'ErrediMalta'); //impostazione del mittente
        $mail->AddAddress($email);
        $mail->IsHTML(true); 
        $mail->Subject  =  $oggetto;
        $mail->Body     =  $messaggio;
        $mail->AltBody  =  "";
        $mail->AddAttachment($path_allegato);  
        if(!$mail->Send()){
                echo "errore nell'invio della mail: ".$mail->ErrorInfo;
                return false;
        }else{
                return true;
        }
        //echo !extension_loaded('openssl')?"Not Available":"Available";
}
?>
