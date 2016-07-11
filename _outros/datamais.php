<?php
//hora minuto segundo mes dia ano
$periodo = mktime (date("H")+1, date("i")+30, 0, date("m")  , date("d"), date("Y"));
echo date("d/m/Y H:i",$periodo);