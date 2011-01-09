<?php
include_once(dirname(__FILE__)."/spritzen.class.php");
$spritzen	= new spritzen();

if($spritzen->getNotification() === true)
{
	echo 'true';
}
else
{
	echo 'false';
}
?>