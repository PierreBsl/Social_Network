<?php 
/*session_start();*/

require('functions.php');
/*require('constants.php');*/

  //Si le formulaire a été soumis
  if(isset($_POST['login'])) {

    //Si tous les champs ont été remplis
    if(not_empty(['identifiant', 'password'])){
      extract($_POST);

      $q = $db-> prepare("SELECT id, pseudo FROM users 
                WHERE (pseudo = :identifiant OR email = :identifiant)
                AND password = :password AND active = '1'");
      $q->execute([
        'identifiant' => $identifiant,
        'password' => sha1($password)
      ]);

      $userHasBeenFound = $q->rowCount();

      if($userHasBeenFound){

        $user = $q->fetch(PDO::FETCH_OBJ);

        $_SESSION['user_id'] = $user->id;
        $_SESSION['pseudo'] = $user->pseudo;

      } else {
        set_flash("Le nom d'utilisateur ou le mot de passe est incorrect. <?php <br></br> Sinon merci de bien vouloir activer votre compte", 'danger');
        save_input_data();
      }
      
    }
  } else {
    clear_input_data();
  }

?>

