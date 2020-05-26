<?php
session_start();

include('filters/auth_filter.php');
require "includes/functions.php";
require("bootstrap/locale.php");
require('includes/init.php');



if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')){
	//Récupérationdes infos a partir de la BDD
	$user = find_user_by_id($_GET['id']);

	if(!$user){
		redirect('index.php');
	}

} else {
	redirect('edit_user.php?id='.get_session('user_id'));
}

//Si le formulaire a été soumis
	if(isset($_POST['update'])) {

		$errors = [];

		//Si tous les champs ont été remplis
		if(not_empty(['name', 'city', 'country', 'sexe', 'bio'])) {
			extract($_POST);

		if(count($errors) == 0){
			$q = $db->prepare('UPDATE users 
								SET name = :name, city = :city, country = :country,
								sexe = :sexe, linkedin = :linkedin, github = :github, 
								available_for_working = :available_for_working, bio = :bio 
								WHERE id = :id');
			$q->execute([
				'name' => $name,
				'city' => $city,
				'country' => $country,
				'sexe' => $sexe,
				'linkedin' => $linkedin,
				'github' => $github,
				'available_for_working' => !empty($available_for_working) ? '1' : '0',
				'bio' => $bio,
				'id' => get_session('user_id'),
				
			]);
		}

			set_flash("Vos données ont bien été enregistrées");
			redirect('profil.php?id='.get_session('user_id'));
		} else  {
			save_input_data();
			$errors[] = "Veuillez remplir tous les champs marqués d'un (*).";		
		}
		
	} else {
		clear_input_data();
	}

require("views/edit_user.view.php");