<?php $title = "Notifications"; ?>
<?php include('partials/_header.php'); ?>

<div id="main-content">
	<div class="container">
		<h1 class="lead">Vos notifications</h1>
		<ul class="list-group">
					<?php foreach($notifications as $notification): ?>
		 	<li class="list-group-item
		 		<?= $notification->seen == '0' ? 'not_seen' : '' ?>"
		 	>
		 		<?php require("partials/notifications/{$notification->name}.php"
); ?>
		 	</li>
			<?php endforeach; ?>
		</ul>

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