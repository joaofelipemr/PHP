<?php

// 8192
//16384
$zoom    = 6;
$offsetx = 0;//Adicionar ao nome do arquivo
$offsety = 0;//Adicionar ao nome do arquivo
$opath   = __DIR__ . "/tiles2/";

$im      = imagecreatefromjpeg( $argv[1] );
$width   = 16384;
$height  = 16384;

$start   = microtime(true);
echo "\n";
imagemOrigemZoom(1, 512);
imagemOrigemZoom(2, 1024);
imagemOrigemZoom(3, 2048);
imagemOrigemZoom(4, 4096);
imagemOrigemZoom(5, 8192);


for ($z=1; $z<=$zoom; $z++) {
	@mkdir("{$opath}{$z}",0777,true);
	
	echo "{$opath}{$z}.jpg                                 \r";
	if ($z===6) {
		$imoz = $im;
		$tx   = 64;
		$ty   = 64;
	} else {
		$imoz = imagecreatefromjpeg("{$opath}$z.jpg");
		$tx   = imagesx($imoz) / 256;
		$ty   = imagesy($imoz) / 256;
	}

	for ($y=0; $y<$ty; $y++) {
		for ($x=0; $x<$tx; $x++) {
			$imc = imagecrop($imoz, array('x'=>($x*256),'y'=>($y*256),'width'=>256,'height'=>256));
			echo "{$opath}{$z}/{$z}_{$x}_{$y}.jpg           \r";
			imagejpeg($imc, "{$opath}{$z}/{$z}_{$x}_{$y}.jpg");
			imagedestroy($imc);
		}
	}
	imagedestroy($imoz);
}
echo "\n";
echo "Total time: " . round(microtime(true) - $start, 1) . "s\n";


/*************************/
function imagemOrigemZoom($z, $t) {
	global $opath, $width, $height, $im;	
	@mkdir("{$opath}",0777,true);
//	$t = $z * 512;

	if (!file_exists("{$opath}$z.jpg")) {

		$imtmp = imagecreatetruecolor($t, $t);
		imagecopyresampled($imtmp, $im, 0, 0, 0, 0, $t, $t, $width, $height);
		imagejpeg($imtmp, "{$opath}$z.jpg");
		imagedestroy($imtmp);
	}

}