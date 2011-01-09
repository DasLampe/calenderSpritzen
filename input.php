<?php
include_once(dirname(__FILE__)."/spritzen.class.php");
if(!isset($spritzen) && !is_object($spritzen))
{
	$spritzen	= new spritzen();
}

if(!empty($_POST['datum']))
{
	$spritzen->addSpritze($_POST['typ'], $_POST['datum']);
}
header("Location: index.php");
?>