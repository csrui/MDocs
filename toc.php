<h3>TOC</h3>
<ul id="nav" class="nav">
<?php 

	$toc = toc('docs'); 
	foreach($toc as $timestamp => $title) {
		
		echo sprintf('<li><a href="%1$s/%2$s">%2$s</a> %3$s</li>', dirname($_SERVER['PHP_SELF']), $title, date('Y-m-d H:i', $timestamp));
		
	}

?>
</ul>
