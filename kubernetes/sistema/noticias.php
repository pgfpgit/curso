<?php
header("Access-Control-Allow-Origin: *");
include "funcoes.php";
$noticias = getNoticias();
echo json_encode($noticias);
?>
