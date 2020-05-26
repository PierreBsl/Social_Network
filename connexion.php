<?php 
session_start();

include('filters/guest_filter.php');
require('includes/functions.php');
require("bootstrap/locale.php");
require('includes/init.php');



	//Si le formulaire a été soumis
	if(isset($_POST['login'])) {

		//Si tous les champs ont été remplis
		if(not_empty(['identifiant', 'password'])){
			extract($_POST);

			$q = $db-> prepare("SELECT id, pseudo, password AS hashed_password, email FROM users 
								WHERE (pseudo = :identifiant OR email = :identifiant)
								AND active = '1'");
			$q->execute([
				'identifiant' => $identifiant
			]);

			$user = $q->fetch(PDO::FETCH_OBJ);

			if($user && password_verify($password, $user->hashed_password)){

				$_SESSION['user_id'] = $user->id;
				$_SESSION['pseudo'] = $user->pseudo;
				$_SESSION['email'] = $user->email;
			


				//Si l'utilisateur a gardé sa session active
				if (isset($_POST['remember_me']) && $_POST['remember_me'] == 'on'){
					setcookie('pseudo', $user->pseudo, time()+3600*24*365, null, null, false, true);
					setcookie('user_id', $user->id, time()+3600*24*365, null, null, false, true);
					setcookie('avatar', $user->avatar, time()+3600*24*365, null, null, false, true);


				

				redirect_intent_or('profil.php?id='.$user->id);
			} else {
				set_flash("Le nom d'utilisateur ou le mot de passe est incorrect. <?php <br></br> Sinon merci de bien vouloir activer votre compte", 'danger');
				save_input_data();
			}
			
		}
	} else {
		clear_input_data();
	}
}

?>
<?php require('views/connexion.view.php'); ?>