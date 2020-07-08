<?php
session_start();
if($_SESSION["LOGIN"] != TRUE){
    header("location: index.php");
}

ini_set("display_errors",1);
include "funcoes.php";
if($_GET["id"]){
  excluir($_GET["id"]);
}
header("location: inserir_noticias.php");
?>
