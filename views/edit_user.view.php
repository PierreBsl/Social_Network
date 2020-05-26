<?php $title = "Édition de profil"; ?>
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

			<?php if(!empty($_GET['id']) && $_GET['id'] === get_session('user_id')): ?>			
			<div class="col-md-10">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Compléter mon profil</h3>
				  </div>
				  <div class="panel-body">
				    <?php include('partials/_errors.php'); ?>

				    	<form method="post" autocomplete="off">
				    		<div class="row">
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="name">Nom<span class=""text-danger">*</span></label>
				    					<input type="text" name="name" id="name" value="<?= get_input('name') ?: e($user->name) ?>" class="form-control"
				    						   required="required"/>
				    				</div>
				    			</div>
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="city">Ville<span class=""text-danger">*</span></label>
				    					<input type="text" name="city" id="city" value="<?= get_input('city') ?: e($user->city) ?>" class="form-control"
				    						   required="required"/>
				    				</div>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="country">Pays<span class=""text-danger">*</span></label>
				    					<input type="text" name="country" id="country" value="<?= get_input('country') ?: e($user->country) ?>" class="form-control"
				    						   required="required"/>
				    				</div>
				    			</div>
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="sexe">Sexe<span class=""text-danger">*</span></label>
				    					<select required="required" name="sexe" id="sexe" class="form-control"/>
				    						<option value="H" <?= $user->sexe == "H" ? "selected" : ""?>>
				    							♂ Homme 
				    						</option>
				    						<option value="F" <?= $user->sexe == "F" ? "selected" : ""?>>
				    							♀ Femme
				    						</option>
				    					</select>	   
				    				</div>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="linkedin">LinkedIn</label>
				    					<input type="text" name="linkedin" id="linkedin" value="<?= get_input('linkedin') ?: e($user->linkedin) ?>" class="form-control"/>
				    				</div>
				    			</div>
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="github">Github</label>
				    					<input type="text" name="github" id="github" value="<?= get_input('github') ?: e($user->github) ?>" class="form-control"/>
				    				</div>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-12">
				    				<div class="form-group">
				    					<label for="available_for_working">
				    					<input type="checkbox" name="available_for_working" id="available_for_working"  <?= $user->available_for_working ? "checked" : "" ?>/>
				    					Disponible pour travailler
				    				</label>
				    				</div>
				    			</div>
				    			<div class="col-md-12">
				    				<div class="form-group">
				    					<label for="bio">Biographie<span class=""text-danger">*</span></label>
				    					<textarea name="bio" id="bio" cols="30" required="required" rows="10" class="form-control"
				    							  placeholder="Allez-y présentez vous ..."><?= get_input('bio') ?: e($user->bio) ?></textarea>
				    				</div>
				    			</div>
				    		</div>
				
				    		
				    	   <input type="submit" class="btn btn-primary" value="Enregistrer" name="update"/>				    	
				    	</form>

				  </div>
				</div>
			</div>
			<?php endif; ?>
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