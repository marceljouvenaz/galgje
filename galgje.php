<?php

//init
$woordenlijst = array(
	"knie",
	"rug", 
	"nek",
	"elleboog",
);
$gekozen = '';


//kies een woord 

$galgwoord = $woordenlijst[rand(1,sizeof($woordenlijst))];
$length = strlen($galgwoord);
echo "het woord heeft $length letters" . PHP_EOL;

//blanco statusscherm
//gekozen letters, woordstatus, foute letters, stand van de galg
echo "U heeft de volgende letters al gekozen: " . $gekozen . PHP_EOL;

?>