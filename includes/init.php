<?php

require "config/database.php";
require "includes/functions.php";
require "includes/constants.php";
require("bootstrap/locale.php");

if(!empty($_COOKIE['pseudo']) && !empty($_COOKIE['user_id'])){
	$_SESSION['pseudo'] = $_SESSION['pseudo'];
	$_SESSION['user_id'] = $_SESSION['user_id'];
	$_SESSION['avatar'] = $_SESSION['avatar'];

}

	$q = $db->prepare("SELECT id FROM notifications
					   WHERE subject_id = ? AND seen = '0'");

	$q->execute([get_session('user_id')]);
		$notifications_count = $q->rowCount();
