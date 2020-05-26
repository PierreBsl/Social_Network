
<?php $title = "Accueil"; ?>
<?php include('includes/constants.php'); ?>
<?php include('partials/_header.php'); ?>

  <div id="main-content">

    <div class="container">

      <div class="jumbotron">

        <h1><?= WEBSITE_NAME ;?> ? </h1>

        <p> 

           <?= WEBSITE_NAME ;?> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus condimentum enim, quis sollicitudin arcu faucibus sed. Integer vel nibh bibendum, fringilla elit consequat, iaculis orci. Donec id tristique nibh, sit amet finibus nulla. Nulla sed eros vitae nisi sodales semper nec ut dui. <br/>
           
         <a href="inscription.php"> Rejoignez l'aventure ! </a>
        </p>
        <a href="inscription.php" class="btn btn-primary btn-lg">Inscription</a>
      </div>

    </div><!-- /.container -->

  </div>

  <?php include('partials/_footer.php'); ?>