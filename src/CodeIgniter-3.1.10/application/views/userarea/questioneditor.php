<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Edition</title>
    <link rel="stylesheet" type="text/css" href="<?php echo css_url('stylecrea'); ?>">
		<script type="text/javascript" src="<?php echo js_url('dropdown');?>"></script>
	</head>

  <body>
    <fieldset>
      <legend>Editeur Question / <?php echo "Question $numquest"; ?></legend>
      <?php echo validation_errors(); ?>

      <?php echo form_open('Question/maj/'.$numquest, array()); ?>
        <fieldset>
        	<legend>Configuration <?php echo "Question $numquest"; ?></legend>
        		<label for="intitule">Intitulé:</label>
        			<br>
        		<input type="text" name="intitule" placeholder="Entrer l'intitulé de la question" size="50"/> <input type='text' name='aide' placeholder='Aide pour la question'>
        			<br>
              <br>
        		<label for="type">Type:</label>
        			<br>
              <SELECT name="type" size="1">
                <OPTION value = 'empty'>Choisissez un type
                <OPTION value = 'ct'>Champ texte
                <OPTION value = 'zdt'>Zone de texte
                <OPTION value = 'ld'>Liste déroulante
                <OPTION value = 'cac'>Cases à cochers
                <OPTION value = 'br'>Bouton radio
                <OPTION value = 'da'>Date
              </SELECT>
        			<br>
              <br>
        		<label for="nbrep">Nombres de réponses:</label>
        			<br>
        		<input type="number" min="1" name="nbrep" id="nbrep" placeholder="Entrer le nombre de réponses" value='1'/>
              <br>
              <br>
            <?php echo form_reset('','REINITIALISER'); ?><?php echo form_submit('','VALIDER / MODIFIER'); ?>
          </fieldset>
        <?php echo form_close(); ?>

      <?php echo validation_errors(); ?>

			<?php echo form_open('Question/create', array()); ?>
        <fieldset>
          <legend>Edition Question <?php echo $numquest; ?></legend>
          <?php
              echo "<br><input type='text' name='intitule' placeholder='Intitulé de la question' value='$intitule' readonly> <input type='text' name='aide' placeholder='Aide pour la question' value='$aide'> <br>";
              switch ($type)
              {
                case 'empty':
                    echo "<br>Veuillez choisir un type<br>";
                    break;

                case 'ct':
                    for ($i=1; $i <= $nbrep; $i++)
                    {
                      echo "<br> <input type='text' name='ctlabel[$i]' placeholder='Label $i'> : <input type='text' placeholder='Champ texte $i' readonly> <br>";
                    }
                    break;

                case 'zdt':
                    for ($i=1; $i <= $nbrep; $i++)
                    {
                      echo "<br> <input type='text' name='zdtlabel[$i]' placeholder='Label $i'> <br> <textarea rows=4 cols=40 readonly>Zone de texte $i</textarea> <br>";
                    }
                    break;

                case 'ld':
                    echo "<br><SELECT>";
                    for ($i=1; $i <= $nbrep; $i++)
                    {
                      echo "<OPTION>Option $i";
                    }

                    echo "</SELECT><br>";
                    echo "<ul>";
                    for ($i=1; $i <= $nbrep; $i++)
                    {
                      echo "<li><input type='text' name='ldlabel[$i]' placeholder='Label $i'><br>";
                    }
                    echo "</ul>";
                    break;

                case 'cac':
                    for ($i=1; $i <= $nbrep; $i++)
                    {
                      echo "<br><input type='checkbox' name='check'><input for='check' type='text' name='caclabel[$i]' placeholder='Label $i'><br>";
                    }
                    break;

                case 'br':
                    for ($i=1; $i <= $nbrep; $i++)
                    {
                      echo "<br><input type='radio' name='radio'> <input for='radio' type='text' name='brlabel[$i]' placeholder='Label $i'><br>";
                    }
                    break;

                case 'da':
                    for ($i=1; $i <= $nbrep; $i++)
                    {
                      echo "<br><input type='text' name='dalabel[$i]' placeholder='Label $i'> <input type='date' name='date'><br>";
                    }
                    break;
              }
          ?>
          <br>
          <?php echo form_submit('','VALIDER / QUESTION SUIVANTE'); ?>
        </fieldset>
      <?php echo form_close(); ?>
      <br>
      <?php echo form_open('Question/finish', array()); ?>
        <input type="submit" value="TERMINER FORMULAIRE (NE CREE PAS CETTE QUESTION)"/>
      <?php echo form_close(); ?>
    </fieldset>
  </body>
</html>
