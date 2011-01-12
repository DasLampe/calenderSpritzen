<?php
include_once(dirname(__FILE__)."lib/class/spritzen.class.php");
$spritzen	= new spritzen(dirname(__FILE__)."/stat.xml");

if($spritzen->getNotification() === true)
{
	echo 'true';
}
else
{
	echo 'false';
}
?>