<?php $title = "Liste des utilisateurs"; ?>
<?php include('partials/_header.php');?>

<div id="main-content">
	<div class="container">
		
		<h1>Liste des utilisateurs</h1>

		<?php foreach (array_chunk($users, 4) as $user_set): ?>
			<div class="row users">
				<?php foreach ($user_set as $user): ?>
					<div class="col-md-3 user-block">
						<a href="profil.php?id=<?= $user->id ?>">
							<img src="<?= get_avatar_url($user->email, 70) ?>" alt="<?= e($user->pseudo) ?>" class="avatar img-circle">
						</a>
						
						<h4 class="user-block-username">
							<a href="profil.php?id=<?= $user->id ?>">
								<?= e($user->pseudo) ?>
							</a>
						</h4>
					</div>
				<?php endforeach ?>
			</div>
		<?php endforeach ?>
		<div id="pagination"><?= $pagination ?></div>
    </div>
</div>

		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/jquery.timeago.js"></script>
		<script src="assets/js/jquery.timeago.fr.js"></script>
		<script src="libraries/parsley/parsley.min.js"></script>
		<script src="libraries/parsley/i18n/fr.js"></script>
		<script type="text/javascript">
			window.ParsleyValidator.setLocale('fr');
			$(document).ready(function() {
  			  $(".timeago").timeago();
			});
		};
		</script>
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="src/app.js"></script>
<?php include('partials/_footer.php'); ?>