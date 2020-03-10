<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="fr">
  <head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo css_url('styleinscription'); ?>">
    <a href="<?php echo site_url('Main/home'); ?>">
      <img src="<?php echo img_url('imageretour.png'); ?>" alt="imageretour" height="40px" class="imageretour">
    </a>
    <img src="<?php echo img_url('imagemainmenu-php.png'); ?>" alt="">
    <title>Inscription</title>
  </head>

  <body>
    <div class="gestion">
      <?php echo validation_errors(); ?>

      <?php echo form_open('User/signup',array()); ?>
        	<legend>Inscrivez vos informations dans les champs suivants puis valider</legend>
        		<label for="pseudo">Pseudonyme:</label>
        			<br>
        		<input type="text" name="pseudo_utilisateur" id="pseudo_utilisateur" placeholder="Entrer un pseudonyme" />
        			<br>
              <br>
        		<label for="mdp">Mot de Passe:</label>
        			<br>
        		<input type="password" name="mdp" id="mdp" maxlength="4" placeholder="4 Caractères maximum"/>
        			<br>
              <br>
        		<label for="Cmdp">Confirmation Mot de Passe:</label>
        			<br>
        		<input type="password" name="Cmdp" id="Cmdp" maxlength="4" placeholder="4 Caractères maximum"/>
        			<br>
        			<br>
        		<?php echo form_reset('','REINITIALISER'); ?>
        			<br>
              <br>
            <?php echo form_submit('',"VALIDER L'INSCRIPTION"); ?>
      <?php echo form_close(); ?>
    </div>
    <div class="description">
      <h1>C'est quoi ELGOOG ?</h1>
      <p>Bonjour et Bienvenue,<br>
        Sur cette plateforme, vous allez pouvoir créer des formulaire<br>
      dans le même style que les formulaires google. En vous inscrivant vous allez
      pouvoir créer les formulaires de vos rêves, les partager à vos amis ou au monde entier
      et voir leur réponses à vos questions.</p>
    </div>
  </body>
</html>
