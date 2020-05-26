<?php
session_start();

include('filters/auth_filter.php');
require "includes/functions.php";
require("bootstrap/locale.php");
require('includes/init.php');

if(!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')){
	if (!if_a_friend_request_has_already_been_sent(get_session('user_id'), $_GET['id'])) {
		$id = $_GET['id'];

		$q = $db->prepare('INSERT INTO friends_relationships(user_id1, user_id2) VALUES(:user_id1, :user_id2)');

		$q->execute([
		'user_id1' => get_session('user_id'),
		'user_id2' => $id
		]);

		$q = $db->prepare('INSERT INTO notifications(subject_id, name, user_id)
						   VALUES(:subject_id, :name, :user_id)');
		$q->execute([
			'subject_id' => $id,
			'name' => 'friend_request_sent',
			'user_id' => get_session('user_id'),
 		]);



		set_flash("Votre demande d'amitié a été envoyée avec succès !");
		redirect('profil.php?id='.$id);
	} else {
		set_flash("Cet utilisateur vous a déjà envoyé une demande d'amitié");
		redirect('profil.php?id='.$_GET['id']);
	}
} else {
	redirect('profil.php?id='.get_session('user_id'));
}

