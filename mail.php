<?php

class Mail
{
         
    function send_mail($str_mail_to,$name)
    {
         date_default_timezone_set("Asia/Kolkata");         //These 3 Lines just Use For Display Current Time
         $date= date("Y/m/d") ; 
         $time=date("h:i:sa");
         require 'PHPMailer_5.2.0/class.phpmailer.php';     //include PHPMailer File For Sending Mail
         $mail = new PHPMailer;                             //Create Object Of PHPMailer File  
        // $mail->SMTPDebug = 2;                            //used for testing purpose
         $mail->isSMTP();
         $mail->Debugoutput = 'html';                       // Set mailer to use SMTP
         $mail->Host ='smtp.gmail.com';                     // Specify main and backup server
         $mail->Port = 587;                                 // Set the SMTP port
         $mail->SMTPSecure = 'tls';                         //used for smtp secure
         $mail->SMTPAuth =true;                             // Enable SMTP authentication
         $mail->Username ='balaji.pastapure007@gmail.com';  // SMTP username self
         $mail->Password = 'llrfwynrfkrxazqi';              // SMTP password self       
         $mail->From = 'balaji.pastapure007@gmail.com';
         $mail->FromName = 'PHP';                           //Subject Name
         $mail->AddAddress($str_mail_to, 'Admin');          // Add a recipient
         $mail->IsHTML(true);                               // Set email format to HTML
         $mail->Subject = 'Hello ' . $name;                 //Title Name
         $mail->Body    = '<h3>Hello ,' .$name .' </h3><b>Thanks For Registration With Us You Registred on '. $date. ' at the time of '.$time.'<br/><br/><p>Best Luck......</p></b><br/>' ;  //Body Discriptions     
         $mail->AltBody = 'your site down' ;
         //If Mail Successfully Send Then Disply Message
         if($mail->Send())
         {
            echo "successfully send msg";
         }                      
   }

}

// For Send Mail you must enable your secure app on your mail  and create app for secure password also your project

?>
