<?php
// require 'PHPMailer-master/PHPMailerAutoload.php';
// require 'sendgrid-php/sendgrid-php.php';
require("/opt/lampp/htdocs/nuces/view/sendgrid-php/sendgrid-php.php");
// $mail = new PHPMailer;
// $mail->isSMTP();
// $mail->SMTPSecure = 'ssl';
// $mail->SMTPAuth = true;
// // $mail->Host = 'smtp.gmail.com';
// $mail ->Host = "ssl://smtp.gmail.com"; 
// //echo !extension_loaded('openssl')?"Not Available":"Available";
// $mail->Port = 465;
// $mail->Username = 'emanijaz583@gmail.com';
// $mail->Password = 'perilatendhouse';
// $mail->setFrom('emanijaz583@gmail.com');
// $mail->addAddress('emanijaz583@gmail.com');
// $mail->Subject = 'Hello from PHPMailer!';
// $mail->Body = 'This is a test.';
// //send the message, check for errors
// if (!$mail->send()) {
//     echo "ERROR: " . $mail->ErrorInfo;
// } else {
//     echo "SUCCESS";
// }

// $sender_mail = $_POST['sender_email'];

$recep_mail  = $_POST['recep_email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom("myMailer123456@gmail.com", "Example User");
$email->setSubject($subject);
$email->addTo($recep_mail, "Example User");
$email->addContent("text/plain", $message);
// $email->addContent(
//     "text/html", "<strong>and easy to do anywhere, even with PHP</strong>"
// );

$sendgrid = new \SendGrid('your key here');
try {
    $response = $sendgrid->send($email);
    if($response->statusCode()== 202){
      echo "email successfully sent!";
    }
    else{
      echo "not successful";
    }
    // print $response->statusCode() . "\n";
    // print_r($response->headers());
    // print $response->body() . "\n";
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}
