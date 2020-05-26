<?php $title = "Inscription"; ?>
<?php include('partials/_header.php');?>

<div id="main-content">
	<div class="container">
		<h1>Devenez membre dès à présent !</h1>

		<?php include('partials/_errors.php') ?>

		<form method="post" class="well col-md-6" autocomplete="off">

			<!-- Nom -->
			<div class="form-group"> 
				<label class="control-label" for="name">Nom :</label>
				<input type="text" value="<?= get_input('name') ?>" class="form-control" id="name" name="name" required="required"/>
			</div>

			<!-- Pseudo -->
			<div class="form-group"> 
				<label class="control-label" for="pseudo">Pseudo :</label>
				<input type="text" value="<?= get_input('pseudo') ?>" class="form-control" id="pseudo" name="pseudo" required="required"/>
			</div>

			<!-- Email -->
			<div class="form-group"> 
				<label class="control-label" for="email">Adresse e-mail :</label>
				<input type="email" value="<?= get_input('email') ?>" class="form-control" id="email" name="email" required="required" aria-describedby="basic-addon2"/>
				<span class="input-group-addon" id="basic-addon2">@gmail.com</span>
			</div>
			
			<!-- Password -->
			<div class="form-group"> 
				<label class="control-label" for="password">Mot de passe :</label>
				<input type="password" class="form-control" id="password" name="password" required="required"/>
			</div>

			<!-- Password -->
			<div class="form-group"> 
				<label class="control-label" for="password_confirm">Confirmer votre Mot de passe :</label>
				<input type="password" class="form-control" id="password_confirm" name="password_confirm" required="required" data-parsley-equalto="#password"/>
			</div>

			<input type="submit" class="btn btn-primary" value="Inscription" name="register">

		</form>
	</div>
</div>

			</br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="src/app.js"></script>
		<?php include('partials/_footer.php');?>