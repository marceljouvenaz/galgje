<?php

//init
$woordenlijst = array(
	"knie",
	"rug", 
	"nek",
	"elleboog",
);
$gekozen = '';
$woordstatus = array('',);

//kies een woord 
$galgwoord = $woordenlijst[rand(1, sizeof($woordenlijst))];
$length = strlen($galgwoord);
echo "het woord heeft $length letters" . PHP_EOL;

//blanco statusscherm
//gekozen letters, woordstatus, foute letters, stand van de galg
echo "U heeft de volgende letters al gekozen: " . $gekozen . PHP_EOL;
echo "U weet dit van het woord: " . $woordstatus[0] . PHP_EOL;
echo "De volgende letters staan niet in het woord: " . PHP_EOL;
//blanco galg
echo (" +---+") . PHP_EOL;
echo (" |   |") . PHP_EOL;
echo ("     |") . PHP_EOL;
echo ("     |") . PHP_EOL;
echo ("     |") . PHP_EOL;
echo ("     |") . PHP_EOL;
echo ("     |") . PHP_EOL;
echo ("=======") . PHP_EOL;

//deel 3, computer vraagt een letter,

echo "Geef uw keuze voor een letter." . PHP_EOL;
echo "> ";
$input = trim(fgets(STDIN));

//is het een letter? 
if (ctype_lower($input)) {
	if (strlen($input) == 1) {
		echo "De door u gekozen letter is: $input" . PHP_EOL;
	} else {
		echo "U heeft meer dan één letter gekozen." . PHP_EOL;
	}
} else {
	echo "Uw keuze is geen letter." . PHP_EOL;
}



?>