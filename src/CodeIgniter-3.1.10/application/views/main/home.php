<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" type = "text/css" href = "<?php echo css_url('Home'); ?>">
    <link rel = "stylesheet" type = "text/css" href = "<?php echo css_url('stylenonuser'); ?>">
  <title>Bienvenue</title>
  <img src="<?php echo img_url('imagemainmenu-php.png'); ?>" alt="">
</head>
<body>
  <div id="container" class="gestion">
    <h1>ELGOOG FORM</h1>
    <br>
    <div id="body">
      <p>
        <?php echo form_open('Form/get', array()); ?>
          <input type='text' name='cleform' placeholder='Rentrer la clé formulaire'></input>
          <?php echo form_submit('','Valider clé formulaire'); ?>
        <?php echo form_close(); ?>

        <a href="<?php echo site_url('User/signin'); ?>">Connectez-vous</a>
        </br>

        <a href="<?php echo site_url('User/signup'); ?>">Inscrivez-vous</a>
        </br>

        <a href="<?php echo site_url('Main/mainmenu'); ?>">Qu'est ce que c'est ?</a>
        </br>
      </p>
    </div>
  </div>
</body>
</html>
