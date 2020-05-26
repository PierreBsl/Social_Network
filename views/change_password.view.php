<?php $title = "Changement de mot de passe"; ?>
<?php include('partials/_header.php');?>

<div id="main-content">
	<div class="container">
		<div class="row">	

			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Changer de mot de passe</h3>
				  </div>
				  <div class="panel-body">
				    <?php include('partials/_errors.php'); ?>

				    	<form data-parsley-validate method="post" autocomplete="off">
				    		<div class="form-group">
				    			<label for="current_password">Mot de passe actuel<span class=""text-danger">*</span></label>
				    			<input type="password" name="current_password" id="current_password" class="form-control"
				    						   required="required" data-parsley-minlength="6"/>
				    		</div>
				    		<div class="form-group">
				    			<label for="new_password">Nouveau mot de passe<span class=""text-danger">*</span></label>
				    			<input type="password" name="new_password" id="new_password" class="form-control"
				    						   required="required" data-parsley-minlength="6"/>
				    		</div>
				    		<div class="form-group">
				    			<label for="new_password_confirmation">Confirmation du nouveau mot de passe<span class=""text-danger">*</span></label>
				    			<input type="password" name="new_password_confirmation" id="new_password_confirmation" class="form-control"
				    						   required="required" data-parsley-equalto="#new_password"/>
				    		</div>			    		
				    	   <input type="submit" class="btn btn-primary" value="Enregistrer" name="change_password"/>				    	
				    	</form>

				  </div>
				</div>
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