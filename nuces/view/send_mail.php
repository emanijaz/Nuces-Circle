<?php
require("/opt/lampp/htdocs/nuces/view/sendgrid-php/sendgrid-php.php");


$recep_mail  = $_POST['recep_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("myMailer123456@gmail.com", "Example User");
$email->setSubject($subject);
$email->addTo($recep_mail, "Example User");
$email->addContent("text/plain", $message);


$sendgrid = new \SendGrid('your key here');
try {
    $response = $sendgrid->send($email);
    if($response->statusCode()== 202){
      echo "email successfully sent!";
    }
    else{
      echo "not successful";
    }
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
