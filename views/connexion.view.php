<?php $title = "Connexion"; ?>
<?php include('partials/_header.php');?>

<div id="main-content">
	<div class="container">
		<h1>Connexion</h1>

		<?php include('partials/_errors.php') ?>

		<form method="post" class="well col-md-6" autocomplete="on">

			<!-- Nom -->
			<div class="form-group"> 
				<label class="control-label" for="identifiant">Pseudo ou adresse e-mail</label>
				<input type="text" value="<?= get_input('identifiant') ?>" class="form-control" id="identifiant" name="identifiant" required="required"/>
			</div>

			<!-- Password -->
			<div class="form-group"> 
				<label class="control-label" for="password">Mot de passe :</label>
				<input type="password" class="form-control" id="password" name="password" required="required"/>
			</div><br>

			<!--Remember me -->
			<div class="form-group"> 
				<label class="control-label" for="remember_me">
					<input type="checkbox" name="remember_me" id="remember_me" />
					Garder ma session active
				</label>
			</div><br>
				

			<input type="submit" class="btn btn-primary" value="Connexion" name="login">

			<br></br>
		</form>
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