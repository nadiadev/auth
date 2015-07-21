<?php
session_start();


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Connexion !</title>
</head>
<body>

	<form method="POST" action="login_handler.php">
		<input type="text" name="email" placeholder="Email or username">
		<input type="password" name="password" placeholder="Password">
		<input type="submit" value="OK">
	</form>
	<?php
	//si on a strocké un message d'erreur (dans login_handler.php) 
	if(!empty($_SESSION['login_error'])){
		//affiche le message d'erreur
		echo $_SESSION['login_error'];
		//on a affiché le message, alors on peut le virer
		unset($_SESSION['login_error']);
	} 
	?>
	
</body>
</html>