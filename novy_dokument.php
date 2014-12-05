<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/styl.css">
<title>
<?php
if ($_GET["dokument"] == "faktura") {
		if ($_GET["typ"] == "vydana") {
			echo "Nová vydaná faktura";
		}
		elseif ($_GET["typ"] == "prijata") {
			echo "Nová přijatá faktura";
		}
	}
if ($_GET["dokument"] == "doklad") {
	if ($_GET["typ"] ==  "prijem") {
		echo "Nový příjmový pokladní doklad";
	}
	elseif ($_GET["typ"] == "vydej") {
		echo "Nový výdajový pokladní doklad";
	}
	else echo "chyba!!!";
}
?>
</title>

<?php
require 'Nette/loader.php';
use Nette\Forms\Form;
?>

</head>

<body>






	<div class="novy_dokument">
		<span class="nadpis_tabulky">
			<?php
				if ($_GET["dokument"] == "faktura") {
					if ($_GET["typ"] == "vydana") {
						echo "Nová vydaná faktura";
					}
					elseif ($_GET["typ"] == "prijata") {
						echo "Nová přijatá faktura";
					}
				}
				if ($_GET["dokument"] == "doklad") {
					if ($_GET["typ"] ==  "prijem") {
						echo "Nový příjmový pokladní doklad";
					}
					elseif ($_GET["typ"] == "vydej") {
						echo "Nový výdajový pokladní doklad";
					}
					else echo "chyba!!!";
				}
			 ?>
		</span>
		<div id="cislo_f" align="right";>
			<?php
				if ($_GET["dokument"] == "faktura") {
				
					$faktura = new Form;
					$faktura->addGroup('cislo');
					$faktura->addText('cislo', 'Číslo faktury');
					$faktura->addText('var_sym', 'Variabilní symbol');
					$faktura->addText('typ_dokl', 'Typ dokladu');
					$faktura->addText('dod_list', 'Dodací list');
					$faktura->addText('objednavka', 'Objednávka');
					

					$faktura->addGroup('datum');
					$faktura->addText('vystaveno', 'Vystaveno');
					$faktura->addText('splatnost', 'Splatnost');
					
					$faktura->addGroup('banka');
					$faktura->addText('k_symbol', 'K. symbol');
					$faktura->addText('uhrada', 'F. uhrady');
					
					$faktura->addGroup('mena');
					$faktura->addText('mena', 'Měna');
					$faktura->addText('kurz', 'Kurz');
					
					echo $faktura;
				}
				if ($_GET["dokument"] == "doklad" ) {
					
					$doklad = new Form;
					$doklad->addGroup('datum');
					$doklad->addText('datum', 'Datum');
					$doklad->addText('pokladna', 'pokladna');
					$doklad->addText('cislo','Číslo');
					$doklad->addText('dan_doklad','Daňový doklad');
					$doklad->addText('plneni','Zdanitelné plnění');
					$doklad->addText('faktura','Faktura');
					$doklad->addText('typ_plneni','Typ plnění');

					$doklad->addGroup('polozky');
					$doklad->addTextArea('polozky', 'Položky');

					$doklad->addGroup('mena');
					$doklad->addText('mena', 'Měna');
					$doklad->addText('kurz', 'Kurz');

					echo $doklad;
				}
			?>
		</div>
		<div id="odberatel" align="right">
			<div id="pullquote">
				<span>
				<?php
				if ($_GET["typ"] == "prijata" || $_GET["typ"] == "vydej") {
						echo "Dodavatel";
					}
					else echo "Odběratel";
			 ?>
			 </span>
				<br>
				<span>
					<?php
						if ($_GET["typ"] == "vydana" || $_GET["typ"] == "prijem") {
								echo "Konečný příjemce";
							}
							else
								echo "Subdodavatel";
				 	?>
				</span>
			</div>
			<?php
				$odberatel = new Form;
				$odberatel->addGroup('Odběratel');
				$odberatel->addText('odberatel', 'IČO');
				$odberatel->addText('prijemce', 'IČO');
				echo $odberatel;
			?>
		</div>
			<table class="sazby"  cellspacing="10">
				<tr class="first_row">
						<td></td>
						<td>Základ DPH</td>
						<td>DPH</td>
						<td>Celkem s DPH</td>
				</tr>
				<tr>
					<td class="first_column" align="center">
						21 %
					</td>
					<td>
						<input type="text" id="zaklad21" class="vstup" >
					</td>
					<td>
						<input type="text" id="dph21"  class="vstup">
					</td>
					<td>
						<input type="text" id="celkem21"  class="sDPH">
					</td>
				</tr>
				<tr>
					<td class="first_column" align="center">
						15 %
					</td>
					<td>
						<input type="text" id="zaklad15" class="vstup" >
					</td>
					<td>
						<input type="text" id="dph15"  class="vstup">
					</td>
					<td>
						<input type="text" id="celkem15"  class="sDPH">
					</td>
				</tr>
				<tr>
					<td class="first_column" align="center">
						0 %
					</td>
					<td>
						<input type="text" id="zaklad0" class="vstup" >
					</td>
					<td>
						<input type="text" id="dph0"  class="vstup">
					</td>
					<td>
						<input type="text" id="celkem0"  class="sDPH">
					</td>
				</tr>
				<tr>
					<td class="first_column" align="center">
						celkem
					</td>
					<td>
						<input type="text" id="zakladcelkem" class="vstup" >
					</td>
					<td>
						<input type="text" id="dphcelkem"  class="vstup">
					</td>
					<td class="posledni">
						<input type="text" id="celkemcelkem"  class="sDPH">
					</td>
				</tr>
			</table>
			<div id="popis">
				<?php
					$text = new Form;
					$text->addGroup('Text');
					$text->addText('text');
					echo $text;
				?>
					<input type="text" id="prepis">
				
			</div>
			<input type="button" value="Uložit fakturu" id="ulozit" class="tlacitko">
			<input type="button" value="Zpět" id="zpet" class="tlacitko">
		</div>


</body>
</html>
