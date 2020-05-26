<?php 
session_start();

include('filters/auth_filter.php');
require('includes/functions.php');
require("bootstrap/locale.php");
require('includes/init.php');



if(isset($_POST['publish'])){

	if(!empty($_POST['content'])){
		extract($_POST);

		$q = $db->prepare('INSERT INTO microposts(content, user_id, created_at) VALUES(:content, :user_id, NOW())');
		$q->execute([
			'content' => $content,
			'user_id' => get_session('user_id')
		]);

		set_flash('Votre statut à été mis à jour');
	}
}

redirect('profil.php?id='.get_session('user_id'));