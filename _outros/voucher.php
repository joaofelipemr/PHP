<?php

function voucher($qtd = "", $type = "", $side = "", $txt = "") {
	//qtd 	= quantidade que será retornado incluindo o valor em $txt
	//type	= default ou null caracteres minusculos e maiusculos
	//		= lowercase apenas caracteres minúsculos
	//		= uppercase apenas caracteres maiúsculos
	//side 	= lado em que quero colocar o texto
	//txt 	= texto
	$chars 			= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
	$cLowercase 	= "0123456789abcdefghijklmnopqrstuvwxyz";
	$cUppercase 	= "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
	$string_length 	= $qtd - (strlen($txt));
	
	if($qtd === ""){$string_length = 10 - (strlen($txt));}
	
	if($string_length < 1){
		throw new Exception(_t("we_voucher_side_erro_qtd"));
	}elseif($string_length < 3){
		//voucher precisa de pelo menos 3 variaveis para ser um gerador
		throw new Exception(_t("we_voucher_side_erro_qtd"));
	}
	
	if($type !== ""){
		if($type === "lowercase"){
			$chars = $cLowercase;
		}else if($type === "uppercase"){
			$chars = $cUppercase;
		}
	}
	
	$randomstring = '';
	$strLen = strlen($chars);
	//pega a quantidade de caracteres existentes em chars
	for ($i=0; $i<$string_length; $i++) {		
		//com a quantidade de caracteres obtida rand seleciona um numero aleatório
		$rnum = rand(0, ($strLen-1));
		//com esse numero aleatório seleciona o 1 caracter encontrado
		$newLetter = substr($chars, $rnum, 1);
		//adiciona a randomstring o novo caracter
		$randomstring = $newLetter . $randomstring;
	}
	
	if($side === "" OR $side === "left"){
		$randomstring = $txt . $randomstring;
	}else if($side === "right"){
		$randomstring = $randomstring . $txt;
	}else{
		throw new Exception(_t("we_voucher_side_erro_side"));
	}
	
	return $randomstring;
}

echo voucher();