<?php
if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
    echo 'Servidor usando Windows!';
} elseif(strtoupper(substr(PHP_OS, 0, 3)) === 'Lin') {
    echo 'Servidor usando Linux!';
} else{
    echo 'Nao detectado';
}