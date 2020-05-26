<?php
session_start();

require ("includes/functions.php");
include('filters/auth_filter.php');
require("bootstrap/locale.php");
require('includes/init.php');


	//Si le formulaire a été soumis
	if(isset($_POST['change_password'])) {

		$errors = [];

		//Si tous les champs ont été remplis
		if(not_empty(['current_password', 'new_password', 'new_password_confirmation'])) {
			extract($_POST);

			if (mb_strlen($new_password) < 6){
                $errors[] = "Votre mot de passe est trop court merci d'utiliser au moins 6 caractères";
            } else {
                if($new_password != $new_password_confirmation){
                    $errors[] = "Les deux mots de passe ne correspondent pas";
                }
            }

            if(count($errors) == 0){
            	$q = $db-> prepare("SELECT password AS hashed_password FROM users 
								WHERE (id = :id)
								AND active = '1'");
				$q->execute([
					'id' => get_session('user_id')
				]);

				$user = $q->fetch(PDO::FETCH_OBJ);

				if($user && password_verify($current_password, $user->hashed_password)){

					$q = $db->prepare('UPDATE users 
								SET password = :password 
								WHERE id = :id');
					$q->execute([
						'password' => password_hash($new_password, PASSWORD_BCRYPT),
						'id' => get_session('user_id'),
						
					]);

					set_flash("Votre mot de passe a bien été mis à jour");
					redirect('profil.php?id='.get_session('user_id'));
				} else {
					save_input_data();
					$errors[] = "Le mot de passe actuel est incorrect.";
				}
			}

		} else  {
			save_input_data();
			$errors[] = "Veuillez remplir tous les champs marqués d'un (*).";		
		}
		
	} else {
		clear_input_data();
	}

require("views/change_password.view.php");