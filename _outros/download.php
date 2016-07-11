<?php

$file = 'template/monkey.odt';

if($_GET["teste"]){
	if (file_exists($file)) {
		header("Content-Length: ".filesize($file));
		header("Content-Disposition: attachment; filename=\"{$file}\"");
		readfile($file);
	}
}
?>
