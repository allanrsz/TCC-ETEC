<?php


$host = 'localhost';
$usuario = 'root';
$perguntas = 'root';
$senha_user = '';
$banco = 'registrar';

$conex= mysqli_connect($host,$usuario,$senha_user,$banco);
if(!$conex){
    die ("conexao falhou". mysqli_connect_errno());
    
}



?>
