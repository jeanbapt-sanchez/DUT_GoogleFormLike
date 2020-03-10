<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Création</title>
	    <link rel="stylesheet" type="text/css" href="<?php echo css_url('style'); ?>">
	    <a href="<?php echo site_url('User/mainmenu'); ?>">
		<img src="<?php echo img_url('imageretour.png'); ?>" alt="imageretour" height="40px" class="imageretour">
		</a>
		<script type="text/javascript" src="<?php echo js_url('dropdown');?>"></script>
	</head>

	<body BGCOLOR=#666666>
		<div class="dropdown">
		  <button onclick="myFunction()" class="dropbtn">.  .  . </button>
		  <div id="myDropdown" class="dropdown-content">
				<a href="<?php echo site_url('User/mainmenu'); ?>">Accueil</a>
				<a href="<?php echo site_url('Form/formmanager'); ?>">Mes Formulaires</a>
				<a href="<?php echo site_url('User/result'); ?>">Mes Résultats</a>
				<a href="<?php echo site_url('Main/home'); ?>">Déconnexion</a>
		  </div>
		</div>

		<img src="<?php echo img_url('imagemainmenu-phpv2.png'); ?>" alt="">
		<div class="gestion">
			<?php echo validation_errors(); ?>

			<?php echo form_open('Form/create', array()); ?>
				<legend class="centrage">Espace création</legend>
				<p>Clé Formulaire</p>
				<input type="text" name="cleform" value="<?php echo $cleform?>"readonly>
				<p>Titre</p>
				<input type="text" name="titre" placeholder="Donnez le titre du formulaire">
				<p>Description</p>
				<textarea name="description" rows="10" cols="30" placeholder="Donnez une description du formulaire"></textarea>
				<?php echo form_submit('','LANCER CREATION'); ?>
			<?php echo form_close(); ?>
		</div>
	</body>
</html>
