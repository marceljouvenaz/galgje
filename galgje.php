<?php

//init
$woordenlijst = array(
	"knie",
	"rug", 
	"nek",
	"elleboog",
);
$gekozen = '';
$woordstatus = array('*',);
$aantalfouten = 0;

//galgjes in heredoc strings
$galg[0] = <<<ABC
 +---+
 |   | 
     |
     |
     |     
     |
     |
=======
ABC;
$galg[1] = <<<ABC
 +---+
 |   | 
 o   |
     |
     |     
     |
     |
=======
ABC;
$galg[2] = <<<ABC
 +---+
 |   | 
 o   |
 |   |
     |     
     |
     |
=======
ABC;
$galg[3] = <<<ABC
 +---+
 |   | 
 o   |
/|   |
     |     
     |
     |
=======
ABC;
$galg[4] = <<<ABC
 +---+
 |   | 
 o   |
/|\\  |
     |     
     |
     |
=======
ABC;
$galg[5] = <<<ABC
 +---+
 |   | 
 o   |
/|\\  |
/    |     
     |
     |
=======
ABC;
$galg[6] = <<<ABC
 +---+
 |   | 
 o   |
/|\\  |
/ \\  |     
     |
     |
=======
ABC;

//function

function toonwoord($letter)
//print de bekende letters in het woord, met verder sterretjes
{
	global $galgwoord, $woordstatus;
	$galgarray = str_split($galgwoord);
	for ($i=0; $i < strlen($galgwoord); $i++) { 
		if ($galgarray[$i] == $letter) {
			$woordstatus[$i] = $letter; 
		}
	}

	for ($i=0; $i < strlen($galgwoord); $i++) { 
		echo $woordstatus[$i] . " ";
	}
	echo PHP_EOL;
}

function doorgaan($int){
//true is doorgaan	
//zes fouten dan return false
//woord is af dan return false, 
	global $length, $woordstatus;
	if ($int !== 6) {
		for ($i=0; $i < $length; $i++) { 
			if ($woordstatus[$i] == '*') {
				return true;
			}
		}
	}
	return false;
}

//kies een woord 
$galgwoord = $woordenlijst[rand(0, sizeof($woordenlijst)-1)];
$length = strlen($galgwoord);
$woordstatus = str_repeat('*', strlen($galgwoord));
echo "het woord heeft $length letters" . PHP_EOL;

//blanco statusscherm
echo $galg[0];

//gekozen letters, woordstatus, foute letters, stand van de galg
echo "U heeft de volgende letters al gekozen: " . $gekozen . PHP_EOL;
echo "U weet dit van het woord: " . $woordstatus[0] . PHP_EOL;
echo "De volgende letters staan niet in het woord: " . PHP_EOL;
//deel 3, computer vraagt een letter,

while (doorgaan($aantalfouten)) {
	echo "Geef uw keuze voor een letter." . PHP_EOL . "> ";
	$input = trim(fgets(STDIN));

	//is het een letter? is die letter eerder gebruikt?
	if (ctype_alpha($input)) {
		if (strlen($input) == 1) {
			echo "De door u gekozen letter is: $input" . PHP_EOL;
			if (is_numeric(strpos($gekozen, $input))) {
				echo "deze letter heeft u al eerder geprobeerd" . PHP_EOL;
			} 
			else {
				echo "U heeft deze letter niet eerder gekozen" . PHP_EOL;
				$gekozen .= $input;
				if (is_numeric(strpos($galgwoord, $input))) {
					echo "goedzo, deze letter komt voor in het woord." . PHP_EOL;
					// toon woord met alle bekende letters
					toonwoord($input);
				} else {
					echo "jammer, deze letter komt niet voor in het woord." . PHP_EOL;
					$aantalfouten += 1;
					echo $galg[$aantalfouten];
					// nieuw plaatje
				}	
			}
			$gekozen .=  $input;
		} else {
			echo "U heeft meer dan één letter gekozen." . PHP_EOL;
		}
	} else {
		echo "dit is geen geldige letter voor galgje." . PHP_EOL;
	}
}
if ($aantalfouten == 6) {
	echo "sorry, u heeft verloren" . PHP_EOL;
}else{
	echo "gefeliciteerd, u heeft gewonnen" . PHP_EOL;
}
?>