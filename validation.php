	<?php
	require('config/config.php');
	require('model/functions.fn.php');
	session_start();

	if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
		!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
	isUsernameAvailable($db, $username);
	if(isUsernameAvailable($db, $username) == false)
	{

		$_SESSION['message'] = 'Erreur : nom invalide !';
		header('Location: register.php');
	}

	$email = htmlspecialchars($_POST['email']);
	isEmailAvailable($db, $email);
	if(isEmailAvailable($db, $email) == false)
	{
		$_SESSION['message'] = 'Erreur : Email invalide !';
		header('Location: register.php');
	}
	else
	{
		
	    userRegistration( $db, $username, $email, $password);
			header('Location: dashboard.php');
	    
	}



	}else{ 
		$_SESSION['message'] = 'Erreur : Formulaire incomplet';
		header('Location: register.php');
	}