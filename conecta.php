<?php
$conexao = mysqli_connect("localhost", "root", "");

if($conexao)
{
$baseSelecionada = mysqli_select_db($conexao,"Projetos_sitePessoal");
if (!$baseSelecionada) {
    die ('Não foi possível conectar a base de dados: ' . mysql_error());
} } else {
    die('Não conectado : ' . mysql_error());
}
?>