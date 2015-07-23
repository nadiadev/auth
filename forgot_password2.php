<?php
session_start();

include("config.php");
include("functions.php");

if( ! empty($_POST)){
	include("db.php");

	$password = trim(strip_tags($_POST['password']));
	$password_confirm = trim(strip_tags($_POST['password_confirm']));
	$token = $_GET ['token'];
	$password = $_POST['password'];

	//pr($_POST);

$sql = "UPDATE users
		SET password = :password
		WHERE token = :token";


		
		
		$sth = $dbh->prepare($sql);
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);


		$sth->bindValue(":password", $password);
		$sth->bindValue(":token", $token);
		$sth->execute();

		
		$sth->bindValue(":password", $hashedPassword);
		$sth->execute();

	}
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Forgot Password 2</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/auth.css">
</head>
<body>
	<div class="container">
	<form method="POST" id="login_form">
		
		<div>
				<label for="password">Indiquez votre nouveau mot de passe</label></br>
				<input type="password" name="password" id="password" placeholder="password"/>
		</div>

		<div>
				<label for="password_confirm">Confirmez votre nouveau mot de passe !</label></br>
				<input type="password" name="password_confirm" id="password_confirm" placeholder="password_confirm"/>
		</div>
		</br>
		<div>
				<label for="remember_me">Keep me logged in</label>
				<input type="checkbox" id="remember_me" name="_remember_me" checked />
    
		</div>
		</br>
		<input type="submit" value="OK">

	</form>
	</div>
</body>
</html>