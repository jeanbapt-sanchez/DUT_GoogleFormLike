<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Mes Résultats</title>
    	<link rel="stylesheet" type="text/css" href="<?php echo css_url('style'); ?>">
		<a href="<?php echo site_url('User/mainmenu'); ?>"><img src="<?php echo img_url('imageretour.png'); ?>" alt="imageretour" height="40px" class="imageretour"></a>
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
			<h1></h1>
			<p>1ere question à nombre fini : <?php echo '<br>50%' ?></p>
			<p>2eme question à nombre fini : <?php echo '<br>35.375%' ?></p>
			<p>3eme question à nombre fini : <?php echo '<br>50.555%' ?></p>
			<p>4eme question à nombre fini : <?php echo '<br>74.650%' ?></p>
		</div>
	</body>
</html>
