<?php
session_start();

include('filters/auth_filter.php');
require("config/database.php");
require("includes/functions.php");
require('includes/constants.php');


if(!empty($_GET['id'])){
	//Récupérationdes infos a partir de la BDD
	$user = find_user_by_id($_GET['id']);

	if(!$user){
		redirect('index.php');
	}

} else {
		redirect('profil.php?id='.get_session('user_id'));
}

//Si le formulaire a été soumis
	if(isset($_POST['update'])) {

		//Si tous les champs ont été remplis
		if(not_empty(['name', 'city', 'country', 'sex', 'bio '])){
			extract($_POST);

			$q = $db-> prepare('UPDATE users SET name = :name, city = :city, country = :country, sex = :sex, linkedin = :linkedin, github = :github, available_for_working = :available_for_working, bio = :bio WHERE id = :id');
			$q->execute([
				'name' => $name,
				'city' => $city,
				'country' => $sex,
				'linkedin' => $linkedin,
				'github' => $github,
				'avalaible_for_working' => !empty($available_for_working) ? '1' : '0',
				'bio' =>$bio,
				'id' => $id,
			]);

			$userHasBeenFound = $q->rowCount();

			if($userHasBeenFound){

				$user = $q->fetch(PDO::FETCH_OBJ);

				$_SESSION['user_id'] = $user->id;
				$_SESSION['pseudo'] = $user->pseudo;

				redirect('profil.php?id='.$user->id);
			} else {
				set_flash("Le nom d'utilisateur ou le mot de passe est incorrect. <?php <br></br> Sinon merci de bien vouloir activer votre compte", 'danger');
				save_input_data();
			}
			
		}
	} else {
		clear_input_data();
	}

require("views/profil.view.php");