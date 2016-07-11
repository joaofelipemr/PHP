<?php
$url = "https://pixabay.com/static/uploads/photo/2015/10/01/21/39/background-image-967820_960_720.jpg";
$data = file_get_contents($url);
$data = base64_encode($data);
