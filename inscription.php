<?php 
session_start();

include('filters/guest_filter.php');
require('config/database.php');
require('includes/functions.php');
require('includes/constants.php');

	//Si le formulaire a été soumis
	if(isset($_POST['register'])) {

		//Si tous les champs ont été remplis
		if(not_empty(['name', 'pseudo', 'password', 'password_confirm'])){

			$errors = [];

			extract($_POST);

			if (mb_strlen($pseudo) < 3){
				$errors[] = "Votre pseudo est trop court merci d'utiliser au moins 3 caractères";
			}

			if (! filter_var($email, FILTER_VALIDATE_EMAIL)){
				$errors[] = "Votre adresse e-mail est invalide";
			}

			if (mb_strlen($password) < 6){
				$errors[] = "Votre mot de passe est trop court merci d'utiliser au moins 6 caractères";
			} else {
				if($password != $password_confirm){
					$errors[] = "Les deux mots de passe ne correspondent pas";
				}
			}

			if(is_already_in_use('pseudo', $pseudo, 'users')){
				$errors[] = "Pseudo déjà utilisé";
			}

			if(is_already_in_use('email', $email, 'users')){
				$errors[] = "Adresse e-mail déjà utilisé";
			}

			if(count($errors) == 0){
				//Envoi d'un email d'activation
				$to = $email;
				$subject = WEBSITE_NAME. " - ACTIVATION DE COMPTE";
				$token = sha1($pseudo.$email.$password);

				ob_start();
				require('templates/emails/activation.tmpl.php');
				$content = ob_get_clean();

				$headers  = 'MIME-Version: 1.0' . "\r\n";
				$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

				mail($to, $subject, $content, $headers);

				// information de réception
				set_flash("Mail d'activation envoyé", 'success');

				$q = $db->prepare('INSERT INTO users(name, pseudo, email, password)
								   VALUES(:name, :pseudo, :email, :password)');
				$q->execute([
					'name' => $name,
					'pseudo' => $pseudo,
					'email' => $email,
					'password' => sha1($password),
				]);

				redirect('index.php');
			} else {
				save_input_data();
			}


		} else {
			$errors[] = "Merci de remplir tous les champs";
			save_input_data();
		}
	} else {
		clear_input_data();
	}

?>
<?php require('views/inscription.view.php'); ?>