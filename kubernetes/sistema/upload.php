<?php

include "uploadClass.php";


$file = $_FILES["myfile"];
$tmp = time();
$width = 500;
$height = 500;
$diretorio = "uploads/";
$thumb = false;

$arquivo = $uploadService->Envia_Arquivo($file,$tmp,$width,$height,$diretorio,$thumb );


?>
