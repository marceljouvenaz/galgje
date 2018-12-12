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

//function

function tekengalg($arg1)
//tekent de juiste galg
{
	if ($arg1 == 0) {
		//blanco galg
		echo (" +---+") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("=======") . PHP_EOL;
	}
	if ($arg1 == 1) {
		// galg1 
		echo (" +---+") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo (" o   |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("=======") . PHP_EOL;	
	}
	if ($arg1 == 2) {
		//galg2
		echo (" +---+") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo (" o   |") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("=======") . PHP_EOL;
	}
	if ($arg1 == 3){
		//galg3
		echo (" +---+") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo (" o   |") . PHP_EOL;
		echo ("/|   |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("=======") . PHP_EOL;
	}
	if ($arg1 == 4){
		//galg4
		echo (" +---+") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo (" o   |") . PHP_EOL;
		echo ("/|\  |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("=======") . PHP_EOL;
	}
	if ($arg1 == 5){
		//galg5
		echo (" +---+") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo (" o   |") . PHP_EOL;
		echo ("/|\  |") . PHP_EOL;
		echo ("/    |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("=======") . PHP_EOL;
	}
	if ($arg1 == 6){
		//galg6
		echo (" +---+") . PHP_EOL;
		echo (" |   |") . PHP_EOL;
		echo (" o   |") . PHP_EOL;
		echo ("/|\  |") . PHP_EOL;
		echo ("/ \  |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("     |") . PHP_EOL;
		echo ("=======") . PHP_EOL;
	}
}

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
	$boolret = false;
	if ($int == 6) {
	} else {
		# stop als geen asterisk
		for ($i=0; $i < $length; $i++) { 
			if ($woordstatus[$i] == '*') {
				$boolret = true;
			}
		}
	}
	return $boolret;
}

//kies een woord 
$galgwoord = $woordenlijst[rand(1, sizeof($woordenlijst)) - 1];
$length = strlen($galgwoord);
for ($i=0; $i < $length; $i++) { 
	$woordstatus[$i] = '*';
}
echo "het woord heeft $length letters" . PHP_EOL;

//blanco statusscherm
tekengalg($aantalfouten);

//gekozen letters, woordstatus, foute letters, stand van de galg
echo "U heeft de volgende letters al gekozen: " . $gekozen . PHP_EOL;
echo "U weet dit van het woord: " . $woordstatus[0] . PHP_EOL;
echo "De volgende letters staan niet in het woord: " . PHP_EOL;
//deel 3, computer vraagt een letter,

while (doorgaan($aantalfouten)) {
	echo "Geef uw keuze voor een letter." . PHP_EOL;
	echo "> ";
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
					tekengalg($aantalfouten);
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