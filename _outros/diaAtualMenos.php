<?php
	//we_stringtotime troca por função do PHP strtotime php
	
	
	$checkDate1 = we_strtotime(date('Y-m-d H:i', we_strtotime(now())));
	$checkDate2 = we_strtotime(date('Y-m-d H:i', we_strtotime($temp_dthr_apre)));
	$checkCalc = $checkDate2 - $checkDate1;
		
	//verifica se passaram 30 dias da apresentação
	//2592000 pois 1 min em timestamp = 60 ou seja
	//1min * 60timestamp * 60minutos * 24horas * 30 dias = timestamp do mes
	if($checkCalc < -2592000){
		$movimentacao_arr[$x]['30dias'] = true;
	}elseif($checkCalc < -604800){
		//verifica se passaram 7 dias da apresentação
		//604800 pois 1 min em timestamp = 60 ou seja
		//1min * 60timestamp * 60minutos * 24horas * 7 dias = timestamp de 7 dias
		$movimentacao_arr[$x]['7dias'] = true;
	}
	$movimentacao_arr[$x]['7dias'] = true;