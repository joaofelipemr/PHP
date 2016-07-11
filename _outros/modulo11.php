<?php
if(isset($_GET["cod"])){	
	/**
	 * Modulo 11 similar BB
	 * Calcula o digito verificador de um código baseado no seu valor decimal.
	 * 10 igual X
	 * @param string $ACodigo
	 * @return string
	 */
	 
	$ACodigo = $_GET["cod"];
	//function _modulo11($ACodigo) {
		$lsoma = 0;
		$lmultiplicador = 2;
		$lreversearray = array_reverse(str_split($ACodigo));
		foreach ($lreversearray as $chr) {
			$lsoma += ord($chr) * $lmultiplicador;
			$lmultiplicador++;
			/* Multiplicador não pode ser maior que 9 */
			if ($lmultiplicador > 9) $lmultiplicador = 2;
		}
		$ldv = 11 - ($lsoma % 11);
		if ($ldv >= 10) $ldv = 'X';
		echo "<pre>mod11:";
		print_r($ldv);
		
		echo "<pre>codInformado:";
		print_r($ACodigo);
		
		echo "<pre>codComposto:";
		print_r($ACodigo.$ldv);
	//}
}
?>

<form action="modulo11.php" method="GET">
	<input type="text" id="cod" name="cod" placeholder="Insira o valor" maxlength="20" value="<?php if (isset($_GET["cod"])){ echo $_GET["cod"]; }?>" autofocus/><br/><br/>
	<?php if (isset($_GET["cod"])){ ?>
	<a href="modulo11.php" style="border:1px solid black; font-weight: bold; color: black; padding: 2px 5px 2px 5px; margin-top: 10px; text-decoration: none;">Limpar</a>
	<?php } ?>
</form>