<?php

	//envoie un email grâce aux serveurs SMTP de gmail

	/*||||||||||||||||||||||
	Attention :: Il faut maintenant autoriser les apps en se rendant d'abord sur 
	https://www.google.com/settings/security/lesssecureapps
	||||||||||||||||||||||*/

	/*
	ATTENTION : NE PUBLIEZ PAS VOTRE MOT DE PASSE GMAIL DE VOTRE COMPTE PERSO SUR GITHUB !!!!!
	*/
	//require ("config.php");
	//require ("vendor/autoload.php");
	$factory = new RandomLib\Factory;
	$generator = $factory->getMediumStrengthGenerator();
	$randomString = $generator->generateString(60, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUV(-');
		//echo $randomString;
	//instance de PHPMailer
	$mail = new PHPMailer;

	//config de l'envoi
	$mail->isSMTP();
	$mail->setLanguage('fr');
	$mail->CharSet = 'UTF-8';

	//debug
	$mail->SMTPDebug = 0;	//0 pour désactiver les infos de débug
	$mail->Debugoutput = 'html';

	//config du serveur smtp
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	$mail->SMTPSecure = 'tls';
	$mail->SMTPAuth = true;
	$mail->Username = SMTPUSER;
	$mail->Password = SMTPPASS;

	//qui envoie, et qui reçoit
	$mail->setFrom('div@div.com', 'Argent');
	$mail->addAddress('developpernina@gmail.com', 'Developper Nina');

	//mail au format HTML
	$mail->isHTML(true); 

	//sujet 
	$mail->Subject = 'Envoyé par Developper Nina !';

	//message (avec balises possibles)
	$mail->Body = '<a href="http://localhost/auth/forgot_password2.php?token='.$randomString.'">
	Cliquez ici pour créer un nouveau mot de passe</a>';

	//pièce jointe
	//$mail->addAttachment('panda.gif');

	//send the message, check for errors
	if (!$mail->send()) {
		echo "Mailer Error: " . $mail->ErrorInfo;
	} else {
		echo "Message sent!";
	}
