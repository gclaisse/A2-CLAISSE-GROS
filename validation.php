	<?php
		session_start();

	require('config/config.php');
	require('model/functions.fn.php');
	if(	isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && 
		!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password'])) {

		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
			$email = htmlspecialchars($_POST['email']);

		var_dump(isUsernameAvailable($db, $username));
	if(isUsernameAvailable($db, $username) == false)
	{
		
		$_SESSION['message'] = 'Erreur : nom invalide !';
		header('Location: register.php');
	}else if(isEmailAvailable($db, $email) == false) {
		$_SESSION['message'] = 'Erreur : Email invalide !';
		header('Location: register.php');
	} else {
		
	    userRegistration( $db, $username, $email, $password);
	    	$_SESSION['message'] = 'Inscription validée !';
			header('Location: register.php');
	    
	}



	}else{ 
		$_SESSION['message'] = 'Erreur : Formulaire incomplet';
		header('Location: register.php');
	}