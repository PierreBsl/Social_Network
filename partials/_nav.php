<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">ISEN Help</a>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="list_users.php">Liste des utilisateurs</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

            <?php if(is_logged_in() ): ?>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="<?= get_avatar_url(get_session('email')) ?>" alt="Image de profil de <?= e(get_session('pseudo')) ?>" class="img-circle"><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li class="<?= set_active('profil') ?>">
                        <a href="profil.php?id=<?php get_session('user_id') ?>  "><i class="far fa-user-circle"></i> <?= $menu['mon_profil'][$_SESSION['locale']] ?></a>
                      </li>
                      <li class="<?= set_active('change_password') ?>">
                        <a href="change_password.php"><i class="fas fa-user-cog"></i> <?= $menu['change_password'][$_SESSION['locale']] ?></a>
                      </li>
                      <li class="<?= set_active('entrainement') ?>">
                        <a href="entrainement.php?id=<?php get_session('user_id') ?>  "><i class="fas fa-universal-access"></i> <?= $menu['entrainement'][$_SESSION['locale']] ?></a>
                      </li>
                      <li class="<?= set_active('edition') ?>">
                        <a href="edit_user.php?id=<?php get_session('user_id') ?> "><i class="fas fa-edit"></i> <?= $menu['edition'][$_SESSION['locale']] ?></a>
                      </li>
                      <li role="separator" class="divider"></li>
                      <li><a href="deconnexion.php"><i class="fas fa-sign-out-alt"></i> <?= $menu['deconnexion'][$_SESSION['locale']] ?></a></li>
                    </ul>
                </li>
                <li class="<?= $notifications_count > 0 ? 'have_notifs' : '' ?>">
                    <a href="notifications.php"><i class="fa fa-bell"></i>
                    <?= $notifications_count > 0 ? "($notifications_count)" : ''; ?>
                    </a>
                </li>


            <?php else: ?>
            <li class="<?= set_active('connexion') ?>"><a href="connexion.php"><?= $menu['connexion'][$_SESSION['locale']] ?></a></li>
            <li class="<?= set_active('inscription') ?>"><a href="inscription.php"><?= $menu['inscription'][$_SESSION['locale']] ?></a></li>
            <?php endif; ?>
        </ul>
      </div><!--/.nav-collapse -->
     </div>
  </nav>
   

   