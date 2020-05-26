<?php

if(!isset($_SESSION['user_id']) && !isset($_SESSION['pseudo'])){
	$_SESSION['forwarding_url'] = $_SERVER['REQUEST_URI'];
	
	$_SESSION['notification']['message'] = 'Merci de vous bien vouloir vous connecter pour pouvoir accéder à cette page.';
	$_SESSION['notification']['type'] = 'danger';

	header('Location: connexion.php');
	exit();
} 

?>