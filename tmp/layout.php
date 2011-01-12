<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2011 DasLampe <dasLampe@lano-crew.org> |
// | Encoding:  UTF-8 |
// +----------------------------------------------------------------------+
?>
<html>
<head>
		<link rel="stylesheet" type="text/css" href="http://localhost//calenderSpritzen/css/style.css" />

</head>
<body>
<div id="hp">
	<div id="head">
		SpritzenInfo
	</div>
	
	<div id="content">
		<div class="spritze" style="background-color: 8EBDFA;">
	<h2>Eisen</h2>
	<p>
	Nächste: 13.01.2011
		&nbsp; <span style="background-color: red">(Nur noch 1 Tag(e))</span><br/>
	Letzte: 12.01.2011
	</p>
	<p>
	<form action="input.php" method="post"><input type="hidden" name="typ" value="Eisen" /><input type="text" name="datum" value="12.01.2011" /><input type="submit" name="submit" value="Eintragen"/></form>
	</p>
</div><div class="spritze" style="background-color: FA5050;">
	<h2>B12</h2>
	<p>
	Nächste: 09.02.2011
		&nbsp; (Noch 3 Wochen)<br/>
	Letzte: 12.01.2011
	</p>
	<p>
	<form action="input.php" method="post"><input type="hidden" name="typ" value="B12" /><input type="text" name="datum" value="12.01.2011" /><input type="submit" name="submit" value="Eintragen"/></form>
	</p>
</div><div class="spritze" style="background-color: FFFA63;">
	<h2>ADEK</h2>
	<p>
	Nächste: 23.02.2011
		&nbsp; (Noch 5 Wochen)<br/>
	Letzte: 12.01.2011
	</p>
	<p>
	<form action="input.php" method="post"><input type="hidden" name="typ" value="ADEK" /><input type="text" name="datum" value="12.01.2011" /><input type="submit" name="submit" value="Eintragen"/></form>
	</p>
</div>
	</div>
</div>
</body>
</html>