<?php $title = "Connexion"; ?>
<?php include('partials/_header.php');?>

<div id="main-content">
	<div class="container">
		<h1>Connexion</h1>

		<?php include('partials/_errors.php') ?>

		<form method="post" class="well col-md-6" autocomplete="off">

			<!-- Nom -->
			<div class="form-group"> 
				<label class="control-label" for="identifiant">Pseudo ou adresse e-mail</label>
				<input type="text" value="<?= get_input('identifiant') ?>" class="form-control" id="identifiant" name="identifiant" required="required"/>
			</div>

			<!-- Password -->
			<div class="form-group"> 
				<label class="control-label" for="password">Mot de passe :</label>
				<input type="password" class="form-control" id="password" name="password" required="required"/>
			</div>

			<input type="submit" class="btn btn-primary" value="Connexion" name="login">

			<br></br>

		<?php include('partials/_footer.php');?>