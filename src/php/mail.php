<?
require("class.phpmailer.php");


	//form validation vars
	$formok = true;
	$errors = array();
	
	//sumbission data
	$ipaddress = $_SERVER['REMOTE_ADDR'];
	$date = date('d/m/Y');
	$time = date('H:i:s');
	
	//form data
	$name = $_POST['name'];	
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message = $_POST['message'];


$mail = new PHPMailer();

$mail->IsSMTP();                                 		 	// send via SMTP
$mail->Host     = "smtp.rodriguessi.com.br"; 				 	// SMTP server - or mail.yourdomain.com
$mail->SMTPAuth = true;    								 	// turn on SMTP authentication
$mail->Username = "lucio@rodriguessi.com.br"; 			    // Noreply address on your sevrer
$mail->Password = "noreply-password";						// Noreply's Password

$mail->From     = "lucio@rodriguessi.com.br";					// Noreply address on your sevrer - Again
$mail->AddAddress("your-address@domain.com");			  	// Your Adress Here
$mail->Subject  =  $subject;
$mail->IsHTML(true);  
$mail->CharSet = 'UTF-8';
$mail->Body     =  "<p>Você recebeu uma nova mensagem vinda do Site.</p>
					  <p><strong>Nome: </strong> {$name} </p>
					  <p><strong>Email Address: </strong> {$email} </p>
					  <p><strong>Assunto: </strong> {$subject} </p>
					  <p><strong>Mensagem: </strong> {$message} </p>
					  <p>Esta mensagem foi enviada do IP: {$ipaddress} em {$date} às {$time}</p>";

if(!$mail->Send())
{
   echo "Email não enviado <p>";
   echo "Erro: " . $mail->ErrorInfo;
   exit;
}

echo "Email enviado com sucesso";


?>
