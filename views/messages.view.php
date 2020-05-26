<?php $title = "Messages"; ?>
<?php include('partials/_header.php');?>

<div id="main-content">
	<div class="container">
		<div class="row">

			<div class="col-md-2">
				<ul class="nav nav-pills nav-stacked">
                    <li role="presentation" class="<?= set_active('flux') ?>"><a href="../flux.php">Flux</a></li>
  					<li role="presentation" class="<?= set_active('edit_user') ?>"><a href="../edit_user.php">Éditer le profil</a></li>
  					<li role="presentation" class="<?= set_active('messages') ?>"><a href="../messages.php">Messages</a></li>
				</ul>
			</div>
			
<div class="col-md-10">
				<?php if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>

					<div class="status-post">
						<form action="microposts.php" method="post" data-parsley-validate>
							<div class="form-group">
								<label for="content" class="sr-only">Statut :</label> 
								<textarea name="content" id="content" rows"3" class="form-control" placeholder="Dites quelque chose ..." data-parsley-minlenght="3" required="required" data-parsley-maxlength="140"></textarea>
							</div>

							<div class="form-group status-post-submit">
								<input type="submit" name="publish" value="Publier" class="btn btn-default btn-xs">
							</div> 
						</form>
				<?php endif; ?>


			<?php if(count($microposts) != 0): ?>
				<?php foreach ($microposts as $micropost): ?>
					<?php include('partials/_micropost.php'); ?>
				<?php endforeach; ?>
			<?php else: ?>
				<p></p>
			<?php endif; ?>
			</div>
		
		</div>
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