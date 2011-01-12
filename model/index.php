<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2011 DasLampe <dasLampe@lano-crew.org> |
// | Encoding:  UTF-8 |
// +----------------------------------------------------------------------+
include_once(PATH_CLASS."spritzen.class.php");
include_once(PATH_CLASS."output.class.php");
$spritzen	= new spritzen(PATH_MAIN."stat.xml");

$content	= "";
foreach($spritzen->elemente as $element)
{
	$data		= $spritzen->readElemente($element['name']);
	
	$tpl->vars("typName",		$element['name']);
	$tpl->vars("typColor",		$element['color']);
	$tpl->vars("next1",			date("d.m.Y", $data[0]['next1']));
	if(empty($data[0]['next2']))
	{
		$tpl->vars("next2",		"");
	}
	else
	{
		$tpl->vars("next2",			date("d.m.Y", $data[0]['next2']));
	}
	$tpl->vars("timeLeft",		output::timeToDate($data[0]['next1']));
	$tpl->vars("last",			date("d.m.Y", $data[0]['date']));
	$tpl->vars("form",			output::getForm($element['name']));
	
	$content	.= $tpl->load("infoBlock");
}

$tpl->vars("content", $content);
?>