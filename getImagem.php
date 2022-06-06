<?php

require("conecta.php");

$id_imagem = $_GET["id"];
$querySelecionaPorID = "SELECT ID,
IMAGEM FROM projetos WHERE ID = $id_imagem";
$resultado = mysqli_query($conexao,$querySelecionaPorID);
$imagem = mysqli_fetch_object($resultado);

header("Access-Control-Allow-Origin: *");
header( "Content-type: image/gif");

echo $imagem->IMAGEM;

