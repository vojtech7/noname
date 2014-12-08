<?php
require 'Nette/loader.php';
use Nette\Forms\Form;

$hlavicka = new Form;
$hlavicka->addText('radku', 'Počet řádků')
		->setType('number')
		->setDefaultValue(0);
$hlavicka->addText('c_vypisu', 'Číslo výpisu')
		->setType('number')
		->setDefaultValue(1);
$hlavicka->addText('date', 'Datum');

$data = new Form;
$data->addText('hodnota1');
$data->addText('hodnota2');
$data->addText('hodnota3');
$data->addText('hodnota4');
$data->addText('hodnota5');

$form = new Form;
$form->addSubmit('next', 'Další');

?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/styl.css">
<link rel="stylesheet" type="text/css" href="css/BV.css">

<title>Nový bankovní výpis</title>



</head>

<body>




	<div class="novy_vypis">
		<span class="nadpis_tabulky" id="novy_BV">
			Nový bankovní výpis
	</div>
			<table id="hlavicka">
				<tr>
					<td class="zaklad">Počet řádků</td> 
					<td ><?php echo $hlavicka['radku']->control ?></td><!-- toto se musí hlídat, aby jsme nevypustili špatnej screen!!!!! -->
					<td class="zaklad">Číslo výpisu</td>
					<td ><?php echo $hlavicka['c_vypisu']->control ?></td>
					<td class="zaklad">Datum</td>
					<td ><?php echo $hlavicka['date']->control ?></td>
				</tr>
			</table>
			<table class="sazby"  cellspacing="10" id="seznam" rules="all">
				<tr>
						<td class="first_row" class="doklad"  >Párový doklad</td>
						<td class="first_row" >Variabilní symbol</td>
						<td class="first_row" >Výdej (-)</td>
						<td class="first_row" >Příjem</td>
						<td class="first_row" >Účetní akce</td>
				</tr>
				<tr>
					<td><input type="text" class="next_row"></td>
					<td><input type="text" class="next_row"></td>
					<td><input type="text" class="next_row"></td>
					<td><input type="text" class="next_row"></td>
					<td><input type="text" class="next_row"></td>
				</tr>
				<?php
					
				?>

			</table>

			<div id="dalsi"><?php echo $form;?></div>
			<input type="button" value="Uložit fakturu" id="ulozit" class="tlacitko" onclick="location.href='denik.html'">
			<input type="button" value="Zpět" id="zpet" class="tlacitko" onclick="location.href='denik.html'">
		</div>


</body>
</html>
