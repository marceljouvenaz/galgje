<?php

//init
$woordenlijst = array(
	"knie",
	"rug", 
	"nek",
	"elleboog",
);


//kies een woord 

$galgwoord = $woordenlijst[rand(1,sizeof($woordenlijst))];
$length = strlen($galgwoord);
echo "het woord heeft $length letters";

?>