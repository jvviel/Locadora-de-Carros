<?php
function open_conexao(){
    $conexao = mysql_connect("localhost", "root", "");
    if (!$conexao) {
        echo "Erro ao conectar no banco de dados....";
        exit;
    }
    return $conexao; 
}

function close_conexao($conexao) {
    if (!$conexao) {
        echo "Erro ao fechar banco MySql...";
        //exit;   
    }
     mysql_close($conexao);
}

function selectDb(){
    $banco = mysql_select_db("alugcarros");
    if (!$banco) {
        echo "Banco de Dados alugcarros não existe ou sem conexao...";
        exit;
    }
} 
?>
