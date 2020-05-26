<a href="profil.php?id=<?= $notification->user_id ?>">
	<img src="<?= get_avatar_url($notification->email, 40) ?>" alt="Image de profil de <?= e($notification->pseudo) ?>" class="avatar-xs img-circle">
	<?= e($notification->pseudo) ?>
</a>
vous a envoyé une demande d'amitié <span class="timeago" title="<?= $notification->created_at ?>"><?= $notification->created_at ?></span>.

<a class="btn btn-info" href="accept_friend_request.php?id=<?= $notification->user_id ?>"><i class="fas fa-user-check"></i> Accepter</a>

<a class="btn btn-danger" href="delete_friend.php?id=<?= $notification->user_id ?>"><i class="fas fa-user-times"></i> Refuser</a>