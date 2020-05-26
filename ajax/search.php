<?php
session_start();

require '../config/database.php';
require '../includes/functions.php';

extract($_POST);

$q = $db->prepare('SELECT id, email, pseudo, name FROM users 
				   WHERE (name LIKE :query OR pseudo LIKE :query OR email LIKE :query) LIMIT 5');

$q->execute([
'query' => '%'.$query.'%'
]);

$users = $q->fetchAll(PDO::FETCH_OBJ);

if (count($users) > 0){
	foreach ($users as $user) {
	?>
	<div class="display-box-user">
		<a href="profil.php?id=<?= $user->id ?>">
			<img src="<?= get_avatar_url($user->email, 100) ?>" alt="<?= e($user->pseudo) ?>" class="img-circle" width="25">&nbsp;<?= e($user->name) ?><br><?= e($user->email) ?>
		</a>
	</div>
	<?php
	}
} else {
	echo '<div class="display-box-user">Aucun utilisateur trouvé.</div>';
}
?>