<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2011 DasLampe <dasLampe@lano-crew.org> |
// | Encoding:  UTF-8 |
// +----------------------------------------------------------------------+
include_once(dirname(__FILE__)."/spritzen.class.php");

class output
{	
	private $cSpritzen;
	
	function __construct()
	{
		$this->cSpritzen	= new spritzen();
	}
	
	function outputData($typ)
	{
		$this->getInfo($typ);
		echo '<br><br>';
		$this->getForm($typ);
	}
	
	private function getInfo($typ)
	{
		$elemente	= $this->cSpritzen->readElemente($typ);
	
		echo 'Nächste: '.date("d.m.Y", $elemente[0]['next1']);
		if($elemente[0]['next2'] != NULL)
		{
			echo ' - '.date("d.m.Y", $elemente[0]['next2']);
		}
		$this->timeToDate($elemente[0]['next1']);
		echo '<br>';
		echo 'Letzte: '.date("d.m.Y", $elemente[0]['datum']);
	}
	
	private function getForm($typ)
	{
		echo '<form action="input.php" method="post">';
		echo '<input type="hidden" name="typ" value="'.$typ.'" />';
		echo '<input type="text" name="datum" value="'.date("d.m.Y", time()).'" />';
		echo '<input type="submit" name="submit" value="Eintragen"/>';
		echo '</form>';
	}
	
	public static function timeToDate($timestamp)
	{
		$time	= $timestamp - time();
		$weeks	= $time / (3600 * 24 * 7);
		$return	= "";
		if($weeks <= 1)
		{
			$return	.= '<span style="background-color: red">';
			switch($weeks)
			{
				case 1:
					$return .= '(Noch 1. Woche)';
					break;
				default:
					$days	= floor($weeks * 7);
					$return .= '(Nur noch '.$days.' Tag(e))';
			}
			$return .= '</span>';
		}
		else
		{
			$return .= '(Noch '.floor($weeks).' Wochen)';
		}
		
		return $return;
	}
}