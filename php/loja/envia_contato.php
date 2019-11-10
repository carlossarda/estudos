 <?php
 
	session_start();
 
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$mensagem = $_POST["mensagem"];
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require ("PHPMailer-master/src/Exception.php");
	require ("PHPMailer-master/src/PHPMailer.php");
	require ("PHPMailer-master/src/SMTP.php");
	
	$mail = new PHPMailer();
	$mail->isSMTP();
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 465;
	$mail->SMTPOptions = array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true));
	$mail->SMTPSecure = 'ssl';
	$mail->SMTPAuth = true;
	$mail->Username = "algumemail@email.com";
	$mail->Password = "";
	$mail->setFrom("algumemail@email.com", "TestePhp e Mysql");
	$mail->addAddress("algumemail@email.com");
	$mail->Subject = "Email de contato da loja teste";
	$mail->msgHTML("<html>De: {$nome}</br> email: {$email}</br> mensagem: {$mensagem}</html>");
	$mail->Altbody = "De: {$nome}\n email: {$email}\n mensagem: {$mensagem}";
	#$mail->addAtachment(); em caso de anexo.
	
	if($mail->send()){
		
		$_SESSION["success"] = "Mensagem enviada com sucesso";
		header ("Location: index.php");
	
	}else {
		
		$_SESSION["danger"] = "Erro ao enviar a mensagem. " . $mail->ErrorInfo;
		header ("Location: contato.php");
	}
	die();	
 ?>