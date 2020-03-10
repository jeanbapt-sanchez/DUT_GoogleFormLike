<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="fr">
  <head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo css_url('stylenonuser'); ?>">
    <a href="<?php echo site_url('Main/home'); ?>">
      <img src="<?php echo img_url('imageretour.png'); ?>" alt="imageretour" height="40px" class="imageretour">
    </a>
    <img src="<?php echo img_url('imagemainmenu-php.png'); ?>" alt="">
    <title>Inscription</title>
  </head>

  <body>
    <div class="gestion">
      <?php echo validation_errors(); ?>

      <?php echo form_open('User/signin',array()); ?>
        <legend class="titre">Connectez-vous !</legend>
            <br>
          <label>Pseudonyme :</label>
          <input type="text" name="pseudo_utilisateur" placeholder="Tapez ici votre pseudonyme"/>
            <br>
            <br>
          <label>Mot de Passe:</label>
          <input type="password" name="mdp"  placeholder="Tapez ici votre mot de passe"/>
            <br>
            <br>
        <?php echo form_reset('','REINITIALISER'); ?><?php echo form_submit('','SE CONNECTER'); ?>
      <?php echo form_close(); ?>
      <br>
      <a href="<?php echo site_url('User/signup'); ?>">INSCRIVEZ-VOUS</a>
    </div>
  </body>
</html>
