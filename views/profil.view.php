<?php $title = "Page de profil"; ?>
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
			

			<div class="col-md-5">
				<div class="panel panel-default">
				  <div class="panel-heading">
				    <h3 class="panel-title">Profil de <?= e($user->pseudo) ?>
				    	(<?= friends_count($_GET['id']) ?> ami<?= friends_count($_GET['id']) == 1 ? '' : 's'?>)
				    </h3>
				  </div>
				  <div class="panel-body">
				  	<div class="row">
				    	<div class="col-md-6">
				    		<div class="form-group">
				    			<img src="<?= get_avatar_url($user->email, 100) ?>" alt="Image de profil de <?= e($_SESSION['pseudo']) ?>" class="img-circle">
				    			<br><br><?=
				    			$user->email ? '<i class="fas fa-user-circle"></i>&nbsp;<a href="//fr.gravatar.com/' . e($user->email) . '">Photo de profil </a><br/>' : '' ;
				    			?>
				    			<hr size=5 width=20% align=left>				    			
				    		</div>
				    		<div class="form-group">
				    			<strong><?= e($user->pseudo) ?></strong><br>
				    			<a href="mailto:<?= e($user->email) ?>"><?= e($user->email) ?></a> <br/><br>
				    			<?=
				    			$user->city && $user->country
					    			? '<i class="fa fa-location-arrow"></i>&nbsp;'.e($user->city) . ', ' . e($user->country) . '<br/>'
					    			: ''; 
					    			?><a href="https://www.google.com/maps?q=<?= e($user->city) . ', ' . e($user->country) ?>" target="_blank" >Voir sur Google Maps</a>
				    		</div>
				    	</div>
				    		
				    		<div class="col-md-5">
				    			<!-- <img src="img/logo.jpg.png" align="right"> -->

				    			<br><div class="col-md-10">
				    				<?php if(!empty($_GET['id']) && $_GET['id'] !== get_session('user_id')): ?>
				    					<?php include('partials/_relation_links.php') ?>
				    				<?php endif; ?>

				    			</div><br><br><br><br><br><br>
				    			<?=
				    			$user->linkedin ? '<i class="fab fa-linkedin"></i>&nbsp;<a href="//linkedin.com/' . e($user->linkedin) . '"> '. e($user->linkedin) . '</a><br/>' : '' ;
				    			?><br>
				    			<?=
				    			$user->github ? '<i class="fab fa-github"></i>&nbsp;<a href="//github.com/">' . e($user->github) . '</a><br/>' : '';
				    			?><br>
				    			<?=
				    			$user->sexe == "H" ? '<i class="fa fa-male"></i>' : '<i class="fa fa-female"></i>';
				    			?>
				    			<?=
				    			$user->available_for_working ? 'Disponible pour travailler' : 'Non disponible pour travailler';
				    			?>
				    				
				    		</div>
				    	</div>
				       	
				       	<div class="row">
				       		<div class="col-md-12 well">
				       			<h3><i class="far fa-bookmark"></i> Biographie de <?= e($user->pseudo) ?></h3></div>
				       			<p><BLOCKQUOTE>
				       				<?= 
				       					$user->bio ? nl2br(e($user->bio)) : "Aucune biographie pour le moment ...";
				       				?>
				       			</BLOCKQUOTE></p>
				       		</div>
				       	
				  	</div>
				</div>
			</div>

			<div class="col-md-5">
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