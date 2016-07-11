<?php 
//logof
//exec("shutdown /l");

//interface de desligamento
//exec("shutdown /i"); 

if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    exec("shutdown /l");
} else{
    shell_exec("sudo reboot");
}