<?php

session_start();
include("config.php");
include("vendor/autoload.php");
include("functions.php");
include("db.php");


pr($_POST);

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM users 
		WHERE email = :email
		OR username = :email
		LIMIT 1";

		$sth = $dbh->prepare($sql);
		$sth->bindValue(":email", $email);
		$sth->execute();

		$foundUser = $sth->fetch();

		if ($foundUser){
			//vérifie le mot de passe
			pr($foundUser);

			$isValidPassword = password_verify($password, $foundUser['password']);

			if ($isValidPassword){
			//on préfère ne pas stocker le mot de passe en session,
			//toutes les données seront disponibles sur toutes les pages !
				unset($foundUser['password']);
				$_SESSION["user"] = $foundUser;
				echo "good password !";
			}
			else{
				echo "wrong password !";
			}
		}
		else{
			//redirection vers login avec message d'erreur
			echo "not found !";
		}