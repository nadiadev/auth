<?php
	session_start();

	include("config.php");
	include("vendor/autoload.php");
	include("functions.php");
	
	//pr($_POST);
	$error = "";

	if( ! empty($_POST)){
	include("db.php");

	//$email_confirm = trim(strip_tags($_POST['email_confirm']));
	$email = trim(strip_tags($_POST['email']));
	$factory = new RandomLib\Factory;
	$generator = $factory->getMediumStrengthGenerator();
	$randomString = $generator->generateString(60, '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUV(-');

	if(empty($email)){
		$error = "Veuillez renseigner vote email !";
	}
	//email valide ?
	elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$error = "Votre email n'est pas valide !";
	}

	else{
	//email déjà présent dans la base ?
		$sql ="SELECT email FROM users WHERE email = :email";
		$sth = $dbh->prepare($sql);
		$sth->execute(array(":email" =>$email));
		$foundEmail = $sth->fetchColumn();

		if (!$foundEmail){
			$error = "Vous n'existez pas dans notre base";
		}

	}
	if(empty($error)){	
	//puis on redirige vers la page protégée
		include("token.php");
	}
	$sql = "UPDATE users
			SET token = :token
			WHERE email = :email";

		$sth = $dbh->prepare($sql);
		$sth->bindValue(":token", $randomString);
		$sth->bindValue(":email", $email);
		$sth->execute();
		}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot Password</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/auth.css">
</head>
<body>

	<form method="POST" action="">
		<p>Merci d'indiquer votre email</p>
		<input type="text" name="email" placeholder="Email or username">
		<input type="submit" value="OK">
	<?php echo $error; ?>
	</form>
	
</body>
</html>