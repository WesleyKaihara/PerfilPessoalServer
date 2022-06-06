<?php
header("Access-Control-Allow-Origin: *");
require("conecta.php");
$CATEGORIA = $_POST['categoria'];
$TITULO = $_POST['titulo'];
$LINK = $_POST['link'];
$DESCRICAO = $_POST['descricao'];

$IMAGEM = $_FILES['imagem']['tmp_name'];
$TAMANHO_IMAGEM = $_FILES['imagem']['size'];
$TIPO_IMAGEM = $_FILES['imagem']['type'];
$NOME_IMAGEM = $_FILES['imagem']['name'];

if ( $IMAGEM != "none" )
{
    $fp = fopen($IMAGEM, "rb");
    $conteudo = fread($fp, $TAMANHO_IMAGEM);
    $conteudo = addslashes($conteudo);
    fclose($fp);

$queryInsercao = 
    "INSERT INTO projetos (
    CATEGORIA,
    TITULO,
    DESCRICAO,
    LINK, 
    NOME_IMAGEM,
    TAMANHO_IMAGEM,
    TIPO_IMAGEM, 
    IMAGEM) 
    VALUES (
        '$CATEGORIA',
        '$TITULO',
        '$DESCRICAO',
        '$LINK',
        '$NOME_IMAGEM',
        '$TAMANHO_IMAGEM', 
        '$TIPO_IMAGEM',
        '$conteudo')";

mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir
o registro. Tente novamente.");
echo 'Registro inserido com sucesso!';

// 172.22.214.75:3000
header('Location: http://172.22.214.75:3000/portfolio');


 if(mysql_affected_rows($conexao) > 0)
     print "A imagem foi salva na base de dados.";
 else
     print "Não foi possível salvar a imagem na base de dados.";
 }
else
    print "Não foi possível carregar a imagem.";
?>