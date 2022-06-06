<?php
header("Access-Control-Allow-Origin: *");
require("conecta.php");
$nome = $_POST['nome'];
$email = $_POST['email'];
$Mensagem = $_POST['mensagem'];

var_dump($nome);
if ( $Mensagem != "" )
{
$queryInsercao = 
    "INSERT INTO Mensagens (Nome,Email,Mensagem)
    VALUES (
        '$nome',
        '$email',
        '$Mensagem')";

mysqli_query($conexao,$queryInsercao) or die("Algo deu errado ao inserir
o registro. Tente novamente.");
echo 'Registro inserido com sucesso!';

// 172.22.214.75:3000
header('Location: http://localhost:3000/contato');


 if(mysql_affected_rows($conexao) > 0)
     print "A mensagem foi salva na base de dados.";
 else
     print "Não foi possível salvar a mensagem na base de dados.";
 }
else
    print "Não foi possível carregar a mensagem.";
?>