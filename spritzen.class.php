<?php
class spritzen
{
	private $xmlFile;
	private $xml;
	private $elemente;
	
	function __construct()
	{
		$this->xmlFile	= dirname(__FILE__)."/stat.xml";
		$this->xml		= simplexml_load_file($this->xmlFile);
		$this->elemente = array();
		
		$this->getElemente();
	}
	
	/**
	 * Lese Elemente (z.B. Eisen, B12, ADEK) aus XML Datei
	 */
	private function getElemente()
	{
		foreach($this->xml->Element as $element)
		{
			$this->elemente[(string)$element->name]	= array(
													"name"		=> (string) $element->name,
													"next1"		=> (string) $element->next1,
													"next2"		=> (string) $element->next2
													);
		}
	}
	
	/**
	 * Lese alle Spritzen vom $typ aus
	 * @param string $typ
	 */
	public function readElemente($typ)
	{
		$elemente	= $this->sortArray($this->readSpritze($typ));
		/*for($x=0;$x<count($elemente);$x++)
		{
			$elemente[$x]['datum']	= date("d.m.Y", $elemente[$x]['datum']);
		}*/
		
		return $elemente;
	}
	
	/**
	 * Lese alles zur Spritze aus
	 * @param string $typ
	 */
	private function readSpritze($typ)
	{
		$data	= array();
		
		foreach($this->xml->Data as $spritzen)
		{
			if($spritzen->typ == $typ)
			{
				$data[]		= array(
									"info"		=> $spritzen->info,
									"typ"		=> $spritzen->typ,
									"datum"		=> (int) $spritzen->datum,
									"next1"		=> (int) $spritzen->next1,
									"next2"		=> (int) $spritzen->next2
									);
			}
		}
		
		return $data;
	}
	
	/**
	 * Spritze bekommen einfügen
	 * @param string $typ (Eisen, B12, ect)
	 * @param string $datum (d.m.Y)
	 */
	public function addSpritze($typ,$datum)
	{
		$datum	= explode(".", $datum);
		$datum	= mktime(0,0,0,$datum[1], $datum[0], $datum[2]);
		
		$spritze	= $this->xml->addChild("Data");
		$spritze->addChild("datum",		$datum);
		$spritze->addChild("typ",		$typ);
		$spritze->addChild("next1",		strtotime('+'.$this->elemente[$typ]['next1'], $datum));
		if(!empty($this->elemente[$typ]['next2']))
		{
			$spritze->addChild("next2",		strtotime('+'.$this->elemente[$typ]['next2'], $datum));
		}
		else
		{
			$spritze->addChild("next2",		"");
		}
		
		$datei	= fopen($this->xmlFile, 'w+');
		fwrite($datei, $this->xml->asXML());
		fclose($datei);
	}
	
	/**
	 * Sotiere das Array mit Spritzen nach Datum
	 * @param array $data
	 */
	private function sortArray(Array $data)
	{
		$sortArray = array();
		foreach($data as $key => $array) {
			$sortArray[$key] = $array['datum'];
		}
	
		array_multisort($sortArray, SORT_DESC, SORT_NUMERIC, $data);
		
		return $data;
	}
	
	/**
	 * Muss eine Meldung (Wecker) ausgegeben werden?
	 */
	public function getNotification()
	{
		$spritzen	= array();
		foreach($this->elemente as $key=>$element)
		{
			$spritzen[]		= $this->readElemente($key);
		}
		
		$futureTime	= strtotime("+1 week", time());
		
		for($x=0;$x<count($this->elemente);$x++)
		{
			if(($spritzen[$x][0]['next1'] - $futureTime) <= 0)
			{
				return true;
			}
		}
		return false;
	}
}