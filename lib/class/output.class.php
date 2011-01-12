<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2011 DasLampe <dasLampe@lano-crew.org> |
// | Encoding:  UTF-8 |
// +----------------------------------------------------------------------+

class output
{	
	public static function getForm($typ)
	{
		$return	= '<form action="input.php" method="post">';
		$return	.= '<input type="hidden" name="typ" value="'.$typ.'" />';
		$return .= '<input type="text" name="datum" value="'.date("d.m.Y", time()).'" />';
		$return .= '<input type="submit" name="submit" value="Eintragen"/>';
		$return .= '</form>';
		
		return $return;
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