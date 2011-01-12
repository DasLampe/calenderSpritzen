<?php
// +----------------------------------------------------------------------+
// | Copyright (c) 2011 DasLampe <dasLampe@lano-crew.org> |
// | Encoding:  UTF-8 |
// +----------------------------------------------------------------------+
?>
<div class="spritze" style="background-color: {typColor};">
	<h2>{typName}</h2>
	<p>
	Nächste: {next1}
	{if}{next2} != ""{/if}
	- {next2}
	{/endif}
	&nbsp; {timeLeft}<br/>
	Letzte: {last}
	</p>
	<p>
	{form}
	</p>
</div>