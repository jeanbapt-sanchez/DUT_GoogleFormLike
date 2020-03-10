<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Gestionnaire</title>
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
			<legend class="centrage">Espace gestion</legend>
			<?php
				$this->table->set_heading(array('Clé', 'Titre', 'Etat',' '));

				$template = array('table_open' => '<table class="gestionformulaire">');
				$this->table->set_template($template);

				foreach ($query->result() as $value)
				{
					$this->table->add_row($value->cleform, $value->titre, $value->etatformulaire);
				}
				echo $this->table->generate();
			?>
			<br>
			<?php echo validation_errors(); ?>
			<?php echo form_open('Form/changestate', array()); ?>
					<legend class="centrage">Activer / Perimer</legend>
					<input name="cleform" placeholder="Entrez la clé du formulaire"></input>
				<?php echo form_submit('','MODIFIER'); ?>
			<?php echo form_close(); ?>
    </div>
	</body>
</html>
