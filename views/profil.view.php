<?php $title = "Page de profil"; ?>
<?php include('partials/_header.php');?>

<div id="main-content">
	<div class="container">
		<div class="row">			
			<div class="col-md-6">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Profil de <?= e($_SESSION['pseudo']) ?></h3>
				  </div>
				  <div class="panel-body">
				  	<div class="row">
				    	<div class="col-md-6">
				    		<div class="form-group">
				    			<img src="<?= get_avatar_url($user->email) ?>" alt="Image de profil de <?= e($_SESSION['pseudo']) ?>" class="img-circle">
				    		</div>
				    	</div>
				    	<div class="col-md-6">
				    		<div class="form-group">
				    			<strong><?= e($_SESSION['pseudo']) ?></strong><br>
				    			<a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a>
				    		</div>
				    	</div>
				       	<div class="col-md-6 ">
				    		<a href="deconnexion.php" class="btn btn-primary btn-lg">Se déconnecter</a>
				    	</div>
				   		</div>
				  	</div>
				</div>

			</div>


			<div class="col-md-6">
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
				    					<label for="name">Nom<span class=""text_danger">*</span></label>
				    					<input type="text" name="name" id="name" class="form-control"
				    						   placeholder="<?= e($user->name) ?>"
				    						   required="required"/>
				    				</div>
				    			</div>
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="city">Ville<span class=""text_danger">*</span></label>
				    					<input type="text" name="city" id="city" class="form-control"
				    						   required="required"/>
				    				</div>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="country">Pays<span class=""text_danger">*</span></label>
				    					<input type="text" name="country" id="country" class="form-control"
				    						   required="required"/>
				    				</div>
				    			</div>
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="sex">Sexe<span class=""text_danger">*</span></label>
				    					<select required="required" name="sex" id="sex" class="form-control">
				    						<option value="H">
				    							Homme
				    						</option>
				    						<option value="F">
				    							Femme
				    						</option>
				    					</select>	   
				    				</div>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="facebook">Facebook</label>
				    					<input type="text" name="facebook" id="facebook" class="form-control"/>
				    				</div>
				    			</div>
				    			<div class="col-md-6">
				    				<div class="form-group">
				    					<label for="spotify">Spotify</label>
				    					<input type="text" name="spotify" id="spotify" class="form-control"/>
				    				</div>
				    			</div>
				    		</div>
				    		<div class="row">
				    			<div class="col-md-12">
				    				<div class="form-group">
				    					<label for="available_for_training">
				    					<input type="checkbox" name="available_for_training" id="available_for_training"/>
				    					Disponible pour entraînement
				    				</label>
				    				</div>
				    			</div>
				    			<div class="col-md-12">
				    				<div class="form-group">
				    					<label for="bio">Biographie<span class=""text_danger">*</span></label>
				    					<textarea name="bio" id="bio" cols="30" required="required" rows="10" class="form-control"
				    							  placeholder="Je suis amoureux du sport ..."></textarea>
				    				</div>
				    			</div>
				    		</div>
				    		
				    	   <input type="submit" class="btn btn-primary" value="Enregistrer" name="update"/>
				    	
				    	</form>
				  </div>
				</div>

			</div>
		</div>

	</div>
</div>

<?php include('partials/_footer.php');?>