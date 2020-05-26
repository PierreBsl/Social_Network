<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Sport pour tous</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="<?= set_active('index') ?>"><a href="index.php">Accueil</a></li>

            <?php if( is_logged_in() ): ?>
                <li class="<?= set_active('profil') ?>">
                    <a href="profil.php?id=<?php get_session('user_id') ?>  ">Mon profil</a>
                </li>
            <?php else: ?>
            <li class="<?= set_active('connexion') ?>"><a href="connexion.php">Connexion</a></li>
            <li class="<?= set_active('inscription') ?>"><a href="inscription.php">Inscription</a></li>
            <?php endif; ?>
        </ul>
      </div><!--/.nav-collapse -->
     </div>
  </nav>

   