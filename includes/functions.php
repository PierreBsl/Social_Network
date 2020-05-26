<?php

//Sanitizer
if(!function_exists('e')){
	function e($string){
		if($string){
			return htmlspecialchars($string);
		}
	}
}

//Checks if a friend request has already been sent
if(!function_exists('if_a_friend_request_has_already_been_sent')){
	function if_a_friend_request_has_already_been_sent($id1, $id2){
		global $db;
			
			$q = $db->prepare("SELECT status FROM friends_relationships 
							   WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2) 
						 	   OR (user_id1 = :user_id2 AND user_id2 = :user_id1)");
			$q->execute([
				'user_id1' => $id1,
				'user_id2' => $id2
			]);

			$count = $q->rowCount();

			$q->closeCursor();

			return (bool) $count;
	}
}

//Friends Count
if(!function_exists('friends_count')){
	function friends_count($id){
			global $db;
			
			$q = $db->prepare("SELECT status FROM friends_relationships 
						   WHERE (user_id1 = :user_connected OR user_id2 = :user_connected) AND status = '1'");
			$q->execute([
				'user_connected' => $id
			]);

			$count = $q->rowCount();

			$q->closeCursor();

			return $count;
	}
}

//checks if a friend request has already been sent
if(!function_exists('relation_link_to_display')){
	function relation_link_to_display($id){
		global $db;

		$q = $db->prepare('SELECT user_id1, user_id2, status FROM friends_relationships 
			WHERE (user_id1 = :user_id1 AND user_id2 = :user_id2) 
			OR (user_id1 = :user_id2 AND user_id2 = :user_id1)') ;
		$q->execute([
			'user_id1' => get_session('user_id'),
			'user_id2' => $id
		]);

		$data = $q->fetch();

		if($data['user_id1'] == $id && $data['status'] == '0'){
			//lien accepte
			return "accept_reject_relation_link";
		} elseif($data['user_id1'] == get_session('user_id') && $data['status'] == '0') {
			//message
			return "cancel_relation_link";
		} elseif(($data['user_id1'] == get_session('user_id') or $data['user_id1'] == $id) AND $data['status'] == '1'){
			//lien refuse
			return "delete_relation_link";
		} else {
			//lien d'ajout
			return "add_relation_link";
		}

		$q->closeCursor();
		die($data->status);
	}
}

//Redirection
if(!function_exists('redirect_intent_or')){
	function redirect_intent_or($default_url){
		if($_SESSION['forwarding_url']){
			$url = $_SESSION['forwarding_url'];
		} else {
			$url = $default_url;
		}
		$_SESSION['forwarding_url'] = null;
		redirect($url);
	}
}

//Attribuer une valeur de session par clé
if(!function_exists('get_session')){
	function get_session($key){
		if($key){
			return !empty($_SESSION[$key])
				? e($_SESSION[$key])
				: null;
		}
	}
}

//Attribuer une valeur de session par clé
if(!function_exists('get_current_locale')){
	function get_current_locale(){
		return $_SESSION['locale'];
		
	}
}


//Checker si un utilisateur est connecté
if(!function_exists('is_logged_in')){
	function is_logged_in(){
		return isset($_SESSION['user_id']) || isset($_SESSION['pseudo']);
	}
}

//URL de l'Avatar
if(!function_exists('get_avatar_url')){
	function get_avatar_url($email, $size = 25){
		return "http://gravatar.com/avatar/".md5(strtolower(trim(e($email))))."?s=".$size;
	}
}


//Trouver un utilisateur par son id
if(!function_exists('find_user_by_id')){
	function find_user_by_id($id){
		global $db;

		$q = $db->prepare('SELECT name, pseudo, email, city, country, linkedin, github, sexe, available_for_working, bio FROM users WHERE id = ?');

		$q->execute([$id]);

		$data = $q->fetch(PDO::FETCH_OBJ);

		$q->closeCursor();

		return $data;
	}
}


if(!function_exists('not_empty')){
	function not_empty($fields = []){
		if(count($fields) != 0){
			foreach ($fields as $field){
				if(empty($_POST[$field]) || trim($_POST[$field]) == ""){
					return false;
				}
			}
			return true;
		}
	}
}

if(!function_exists('is_already_in_use')){
	function is_already_in_use($field, $value, $table){
		global $db;

		$q = $db->prepare("SELECT id FROM $table WHERE $field = ?");
		$q->execute([$value]);

	$count = $q->rowCount();

	$q->closeCursor();

	return $count;
	
	}
}

if(!function_exists('set_flash')){
	function set_flash($message, $type = 'info'){
		$_SESSION['notification']['message'] = $message;
		$_SESSION['notification']['type'] = $type;
	}
}

if(!function_exists('redirect')){
	function redirect($page){
		header('Location: ' . $page);
		exit();
	}
}

if(!function_exists('save_input_data')){
	function save_input_data(){
		foreach ($_POST as $key => $value){
			if(strpos($key, 'password') === false)
			$_SESSION['input'][$key] = $value;
		}
	}
}

//Reccupère les input de formulaires stockés de manière temporaire en SESSION
if(!function_exists('get_input')){
	function get_input($key){
		return !empty($_SESSION['input'][$key])
				? e($_SESSION['input'][$key])
				: null;
	}
}

//Supprime tous les input de formulaires stockés de manière temporaire en SESSION
if(!function_exists('clear_input_data')){
	function clear_input_data(){
		if(isset($_SESSION['input'])){
			$_SESSION['input'] = [];
		}
	}
}

//Gère l'état actif ou non des menus 
if(!function_exists('set_active')){
	function set_active($file){
		$a = explode('/', $_SERVER['SCRIPT_NAME']);
		$page = array_pop($a);

		if($page == $file.'.php'){
			return "active";
		} else {
			return "";
		}
	}
}

/*//Hash password avec l'algorithme Blowfish
if(!function_exists('bcrypt_hash_password')){
	function bcrypt_hash_password($value, $options = array()){
		
		$cost = isset($options['rounds']) ? $options['rounds'] : 10;

		$hash = password_hash($value, PASSWORD_BCRYPT, array('cost' => $cost));

		if ($hash === false)
		{
			throw new Exception("Bcrypt hashing n'est pas supporté.");
		}
		return $hash;
	}
}

//Vérification du password
if(!function_exists('bcrypt_verify_password')){
	function bcrypt_verify_password($value, $hashedValue){
		return password_verify($value, $hashedValue);
	}
}*/