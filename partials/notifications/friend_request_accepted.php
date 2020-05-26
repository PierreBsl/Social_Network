<a href="profil.php?id=<?= $notification->user_id ?>">
	<img src="<?= get_avatar_url($notification->email, 40) ?>" alt="Image de profil de <?= e($notification->pseudo) ?>" class="avatar-xs">
	<?= e($notification->pseudo) ?>
</a>
a accepté votre demande d'amitié <span class="timeago" title="<?= $notification->created_at ?>"><?= $notification->created_at ?>
 </span>

