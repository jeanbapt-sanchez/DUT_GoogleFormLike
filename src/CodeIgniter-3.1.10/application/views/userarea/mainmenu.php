<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
  	<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Menu</title>
  	<link rel = "stylesheet" type = "text/css" href = "<?php echo css_url('style'); ?>">
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

	<img src="<?php echo img_url('imagemainmenu-phpv2.png'); ?>" alt="imagefond">
    <div class="gestion">
      <legend class="centrage">BONJOUR <?php echo $pseudo_utilisateur ?></legend>
      <a href="<?php echo site_url('Form/formcreator'); ?>"><input type="button" name="button" value="CREER FORMULAIRE"></button></a>
      <a href="<?php echo site_url('Form/formmanager'); ?>"><input type="button" name="button" value="GERER FORMULAIRE"></button></a>
      <a href="<?php echo site_url('User/result'); ?>"><input type="button" name="button" value="VOIR RESULTAT"></button></a>
    </div>
	</body>
</html>
