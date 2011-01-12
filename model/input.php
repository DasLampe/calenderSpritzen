<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2011 DasLampe <dasLampe@lano-crew.org> |
// | Encoding:  UTF-8 |
// +----------------------------------------------------------------------+
include_once(PATH_CLASS."spritzen.class.php");
if(!isset($spritzen) || !is_object($spritzen))
{
	$spritzen	= new spritzen(PATH_MAIN."stat.xml");
}

if(!empty($_POST['datum']))
{
	$spritzen->addSpritze($_POST['typ'], $_POST['datum']);
}
header("Location: index.php");
?>