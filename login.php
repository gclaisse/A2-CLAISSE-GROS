<?php session_start();

/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');


/********************************
			PROCESS
********************************/

if(isset($_POST['email']) && isset($_POST['password'])){
	if(!empty($_POST['email']) && !empty($_POST['password'])){

		// TODO

        $email = htmlspecialchars($_POST["email"]);
        $password = htmlspecialchars($_POST["password"]);

		// Force user connection to access dashboard
		userConnection($db, 'git@initiation.com', 'password');
		
		header('Location: dashboard.php');

	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';