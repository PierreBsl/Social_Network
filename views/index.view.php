<link rel="stylesheet" type="text/css" href="../css/styles.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">

<!-- font -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500i,700" rel="stylesheet">




<?php $title = "Accueil"; ?>
<?php include('partials/_header.php'); ?>

<img class="logomain" src="">

  <div id="main-content">

    <div class="container">

      <div class="jumbotron">

        <h1><?= WEBSITE_NAME ;?>  </h1>

        <p> Vous avez toujours eu envie de vous mettre à la pratique du sport ou vous êtes déjà un des adeptes de ce
            mode de vie ? Alors bienvenue parmis nous !! Nous sommes un petit groupe de 3 étudiants ayant voulu
            créer un site permettant de pouvoir intégrer ce mode de vie que nous partageons et que nous aimerions
            partager avec vous ! Une paire de chaussures qui traîne dans un carton bien cachée dans le garage ?
            Il est temps pour vous d'aller la chercher et de se mettre en marche (ou plutot en course par chez nous) !
            Suivez nos astuces et nos entraînements adaptés selon vos objectifs. Pour cela n'hésitez pas à vous
            inscrire et à bientôt sur la piste !s

            <br/>
        </p>
        <a href="inscription.php" class="btn btn-primary btn-lg">Inscription</a>
      </div>

    </div><!-- /.container -->

  </div>


  <!-- Contenu sous forme de boîtes -->

   <h2 id="equipe"> L'équipe <i class="fas fa-address-book"></i></h2>
   <hr class="separator">
    <div class="collonnes">
     <div class="col-md-4">
      <h2> Pierre Boislève</h2>

        <ul>
          <li>Cofondateur de ISEN Help</li>
        </ul>

         </br>
     </div>

     <div class="col-md-4 ">
      <h2> Éloi Anselmet </h2>
        <ul>
             <li>Cofondateur de ISEN Help</li>
        </ul>
</br>
     </div>

     <div class="col-md-4">
      <h2> Quentin Fournier </h2>
        <ul>
             <li>Cofondateur de ISEN Help</li>
        </ul>
</br>
     </div>
    </div>

<!-- pop-up -->
<?php require('includes/connexion_modal.php'); ?>
<div id="modal">
      <h2>Se connecter à mon compte</h2>
      <form class="connexion" method="post">
        <!-- Nom -->
        <div> 
          <label class="connexion-label" for="identifiant">Pseudo ou adresse e-mail</label>
          <input type="text" value="<?= get_input('identifiant') ?>" class="connexion-input" id="identifiant" name="identifiant" required="required"/>
        

          <!-- Password -->
          <label class="connexion-label" for="password">Mot de passe :</label>
          <input type="password" class="connexion-input" id="password" name="password" required="required"/>

          <div style="padding-top: 10px;">
            <input type="submit" class="btn btn-primary" value="Connexion" name="login">
            <button class="btn btn-primary" onclick="closeModal()"><span>Annuler</button>
          </div>
        </div>

      </form>
      
        </div>
      <script src="app.js" type="text/javascript"></script>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <!--  <script src="src/app.js"></script>  -->



  <?php include('partials/_footer.php'); ?>
 