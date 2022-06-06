<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: *');
Header("Access-Control-Allow-Credentials", "true");
header("Access-Control-Allow-Headers: *");


require_once("conecta.php");

    $querySelecao = "SELECT * FROM projetos";
    $resultado = mysqli_query($conexao,$querySelecao);

    $itens = [];

    while ($arquivos = mysqli_fetch_array($resultado)) { 
        $itens[] = [
            "ID"=>$arquivos["ID"],
            "CATEGORIA" => $arquivos["CATEGORIA"],
            "TITULO"=>$arquivos["TITULO"],
            "DESCRICAO"=>$arquivos["DESCRICAO"],
            "NOME_IMAGEM"=>$arquivos["NOME_IMAGEM"],
            "TAMANHO_IMAGEM"=>$arquivos["TAMANHO_IMAGEM"]
        ];
    } 
    echo json_encode( $itens);