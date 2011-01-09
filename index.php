<?php
header("content-type: text/html; charset=utf-8");
include_once(dirname(__FILE__)."/output.class.php");
$output	= new output();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div id="hp">
	<div id="head">
		Spritzen Info
	</div>
	
	<div id="content">
		<h1>Info</h1>
		
		<div class="spritze" style="background-color: #8EBDFA;">
		<h2>Eisen</h2>
		<?php 
			$output->outputData("Eisen");
		?>
		</div>
		
		<div class="spritze" style="background-color: #FA5050;">
		<h2>B12</h2>
		<?php
			$output->outputData("B12");
		?>
		</div>
		
		<div class="spritze" style="background-color: #FFFA63;">
		<h2>ADEK</h2>
		<?php
			$output->outputData("ADEK");
		?>
		</div>
	</div>
</div>
</body>
</html>