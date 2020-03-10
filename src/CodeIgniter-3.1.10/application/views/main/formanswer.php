<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>


<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Réponse</title>
	    <link rel="stylesheet" type="text/css" href="<?php echo css_url('style'); ?>">

		<script type="text/javascript" src="<?php echo js_url('dropdown');?>"></script>
	</head>

	<body BGCOLOR=#666666>


			<?php echo validation_errors(); ?>
			<h1>Titre : <?php echo $titre?></h1>
			<p>Description : <?php echo $description?></p>

			<?php echo form_open('Form/send', array()); ?>
				<p>
					<?php
					echo "<input type='text' name='cleform' value='$cleform' hidden></input>";
					echo "<input type='text' name='intitule' value='$titre' hidden></input>";
					echo "<input type='text' name='nbque' value='$nbque' hidden></input>";
					echo "<input type='text' name='nbrep' value='$nbrep' hidden></input>";
						for($j=1;$j<=$nbque;$j++)
						{
							echo "<fieldset><legend>Question numero " . $j . "</legend> <br> Intitulé : <input type='text' name='intitule' value='${"intitule".$j}' readonly> </input> Aide : <input type='text' name='aide' value='${"aide".$j}' readonly> </input><br>";

							for($i=1; $i<=$nbrep; $i++)
							{
									//détermination du type de question
									switch (${"type".$j})
									{
										case 'empty':
												echo "<br>Veuillez choisir un type<br>";
												break;

										case 'ct':
												for ($i=1; $i <= $nbrep; $i++)
												{
													if (${"rep_numquest".$i} == $j)
													{
														echo "<br> <input type='text' name='ctlabel[$i]' value='${"intitule_reponse".$i}' readonly> : <input type='text' name='resultat[]' placeholder='Votre réponse'> <br>";
													}
												}
												break;

										case 'zdt':
												for ($i=1; $i <= $nbrep; $i++)
												{
													if (${"rep_numquest".$i} == $j)
													{
														echo "<br> <input type='text' name='zdtlabel[$i]' value='${"intitule_reponse".$i}' readonly> <br> <textarea rows=4 cols=40 name='resultat[]' placeholder='Votre réponse'></textarea> <br>";
													}
												}
												break;

										case 'ld':
												echo "<br><SELECT name='ldres[$i]'>";
												for ($i=1; $i <= $nbrep; $i++)
												{
													if (${"rep_numquest".$i} == $j)
													{
														echo "<OPTION>${"intitule_reponse".$i}";
													}
												}

												echo "</SELECT><br>";
												break;

										case 'cac':
												for ($i=1; $i <= $nbrep; $i++)
												{
													if (${"rep_numquest".$i} == $j)
													{
														echo "<br><input type='checkbox' name='resultat[]' value='${"intitule_reponse".$i}'><input for='check' type='text' name='checklabel[$i]' value='${"intitule_reponse".$i}' readonly><br>";
													}
												}
												break;

										case 'br':
												for ($i=1; $i <= $nbrep; $i++)
												{
													if (${"rep_numquest".$i} == $j)
													{
														echo "<br><input type='radio' name='resultat[]' value='${"intitule_reponse".$i}'> <input for='radio' type='text' name='radiolabel[$i]' value='${"intitule_reponse".$i}' readonly><br>";
													}
												}
												break;

										case 'da':
												for ($i=1; $i <= $nbrep; $i++)
												{
													if (${"rep_numquest".$i} == $j)
													{
														echo "<br><input type='text' name='datelabel[$i]' value='${"intitule_reponse".$i}' readonly > <input type='date' name='resultat[]'><br>";
													}
												}
												break;
									}
							}
							echo "</fieldset>";
						}
					?>

				<?php echo form_submit('','Valider formulaire'); ?>
			<?php echo form_close(); ?>

	</body>
</html>
