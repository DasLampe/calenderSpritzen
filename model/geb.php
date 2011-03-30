<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2011 DasLampe <dasLampe@lano-crew.org> |
// | Encoding:  UTF-8 |
// Encoding for a special gift, for my Grilfriend. Not interessting for App!
// +----------------------------------------------------------------------+
$content	= "";
function bin2str($binary_string)
{
	$chars = explode(" ", $binary_string);
	$result = "";
	for ($i = 0; $i < count($chars); $i++) {
		$result = $result . chr(base_convert($chars[$i], 2, 10));
	}
	return $result;
}

if(!isset($_POST['submit']))
{
	$content	.= '<form action="geb.php" method="post">';
	$content	.= '<textarea name="string">Genau das hier hilft dir! ;)</textarea>';
	$content	.= '<br/><input type="submit" name="submit" value="Und was heißt das?" />';
	$content	.= '</form>';
}
else
{
	$content	.= "Das heißt:<br/>";
	$content	.= bin2str($_POST['string']);
	$content	.= '<br>';
}
$tpl->vars("content", $content);
