<?php


// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email =  $_POST['email'];
$mensagem = $_POST['mensagem']; 
$nome = $_POST['nome'];

// Load Composer's autoloader
require 'vendor/autoload.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8';
$mail->Encoding = 'base64';

try {
	//Server settings
	$mail->isSMTP();                                            // Send using SMTP
	$mail->Host       = 'smtp.live.com';                    	// Set the SMTP server to send through
	$mail->SMTPAuth   = true;                                   // Enable SMTP authentication
	$mail->Username   = 'ig_igor_lr@hotmail.com';               // SMTP username
	$mail->Password   = 'IgUiN10';                               // SMTP password
	$mail->SMTPSecure = 'tls';         							// Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
	$mail->Port       = 587;                                    // TCP port to connect to

	//Recipients
	$mail->setFrom("ig_igor_lr@hotmail.com");
	$mail->addAddress("igorozani@gmail.com");    				 // Add a recipient
  
  
	// Content
	$mail->isHTML(true);                                  // Set email format to HTML
	$mail->Subject = ("Cadastro realizado com sucesso!");
	$body = "<h3>Cadastro realizado pelo formulário do Guia da Cozinha Vegana<h3>
			Nome: ".$nome."<br />
			E-mail: ".$email."<br />
			Mensagem: ".$mensagem."<br />";
			
	$mail->Body = ("$body");
	$result = $mail->send();
	if($result) {
		require("sucesso.html");
	} 
	
} catch (Exception $e) {
	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
