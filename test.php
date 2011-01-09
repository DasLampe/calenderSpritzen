<?php
include_once("spritzen.class.php");

$spritzen	= new spritzen();

$spritze		= $spritzen->readSpritze("B12");

echo $spritze[0]['typ'];